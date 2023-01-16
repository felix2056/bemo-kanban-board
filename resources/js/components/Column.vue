<template>
    <section class="min-w-[280px] last:pr-6 box-content">
        <div class="flex items-center gap-3 pb-6">
            <div class="rounded-full h-4 w-4" style="background-color: rgb(73, 196, 229);">
            </div>
            <h2 class="text-medium-grey font-bold text-xs uppercase">
                {{ column.title }} ( {{column.cards.length }} )
            </h2>
            <!-- Delete column btn -->
            <button @click="deleteColumn" class="ml-auto text-xs text-medium-grey font-bold hover:text-main-purple">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
        <div class="flex flex-col gap-5">
            <draggable v-model="column.cards" group="card" @start="dragStart" @end="dragEnd" class="flex flex-col gap-5">
                <card v-for="card in column.cards" :key="card.id" :card="card" @card-deleted="removeCard"></card>
                <div slot="footer" class="flex flex-col gap-2">
                    <button @click="openModal" class="text-xs text-medium-grey font-bold hover:text-main-purple">
                        <i class="fas fa-plus"></i>
                        Add new card
                    </button>
                </div>
            </draggable>
            <!-- Start: Modals-->
            <modal :name="'card-modal-column-' + column.id" :width="'40%'" :height="'50%'" :adaptive="true">
                <form class="bg-white dark:bg-dark-grey rounded-lg p-1">
                    <div class="p-5 pr-3 flex flex-col gap-6 max-h-[90vh] overflow-y-scroll">
                        <div class="flex justify-between items-center">
                            <h4 class="text-black dark:text-white font-bold text-lg">Create Card</h4>
                        </div>
                        <div class="text-white relative flex flex-col gap-2 w-full">
                            <label for="Title" class="text-medium-grey dark:text-white text-xs font-bold">Title</label>
                            <input v-model="input.title" type="text" placeholder="e.g. Take coffee break" id="Title" class="peer px-4 py-2 text-black dark:text-white dark:bg-dark-grey text-sm rounded transition-colors outline outline-1 outline-medium-grey/25 cursor-pointer hover:outline-main-purple focus:outline-main-purple placeholder:text-black/25 dark:placeholder:text-white/25">
                        </div>

                        <div class="text-white relative flex flex-col gap-2">
                            <label for="Description" class="text-medium-grey dark:text-white text-xs font-bold">Description</label>
                            <textarea v-model="input.description" placeholder="e.g. It’s always good to take a break. This 15 minute break will  recharge the batteries a little." rows="4" id="Description" class="resize-none px-4 py-2 text-black dark:text-white dark:bg-dark-grey text-sm rounded transition-colors outline outline-1 outline-medium-grey/25 cursor-pointer hover:outline-main-purple focus:outline-main-purple placeholder:text-black/25 dark:placeholder:text-white/25"></textarea>
                        </div>
                        <button @click="createCard" type="button" class="w-full text-sm font-bold py-2.5 px-4 rounded-3xl text-white bg-main-purple hover:bg-main-purple-light">
                            Create Card 
                            <i v-show="isLoading" class="fas fa-spinner fa-spin ml-2"></i>
                        </button>
                    </div>
                </form>
            </modal>
            <!-- End: Modals-->
        </div>
    </section>
</template>

<script>
import draggable from 'vuedraggable'
import Card from './Card.vue'

export default {
    props: {
        column: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            input: {
                title: '',
                description: ''
            },
            isLoading: false
        }
    },

    components: {
        draggable,
        'card': Card
    },

    methods: {
        dragStart() {
            this.$emit('drag-start')
        },

        dragEnd() {
            this.$emit('drag-end')
            // this.column.cards.forEach((card, index) => {
            //     axios.put('/api/cards/' + card.id, {
            //         order: index
            //     })
            // })
        },

        openModal() {
            this.$modal.show('card-modal-column-' + this.column.id)
        },

        createCard() {
            this.isLoading = true
            axios.post('/api/cards', {
                title: this.input.title,
                description: this.input.description,
                column_id: this.column.id
            })
            .then(response => {
                this.input.title = ''
                this.input.description = ''

                this.$modal.hide('card-modal-column-' + this.column.id)
                this.$emit('card-created', response.data)
                this.isLoading = false
            })
            .catch(error => {
                this.$modal.show('dialog', {
                    title: 'Error',
                    text: 'Something went wrong',
                    buttons: [
                        {
                            title: 'Ok'
                        }
                    ]
                })
                this.isLoading = false
            })
        },

        removeCard(card) {
            this.column.cards = this.column.cards.filter(c => c.id !== card.id)
        },

        deleteColumn() {
            this.$modal.show('dialog', {
                title: 'Delete Column',
                text: 'Are you sure you want to delete this column?',
                buttons: [
                    {
                        title: 'Yes',
                        handler: () => {
                            axios.delete('/api/columns/' + this.column.id)
                            .then(response => {
                                this.$modal.hide('dialog')
                                this.$emit('column-deleted');
                            })
                            .catch(error => {
                                this.$modal.show('dialog', {
                                    title: 'Error',
                                    text: 'Something went wrong',
                                    buttons: [
                                        {
                                            title: 'Ok'
                                        }
                                    ]
                                })
                            })
                        }
                    },
                    {
                        title: 'No',
                        handler: () => {
                            this.$modal.hide('dialog')
                        }
                    }
                ]
            })
        }
    }
}
</script>