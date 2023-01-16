<template>
    <article @click="openModal(card.id)" class="group flex flex-col bg-white dark:bg-dark-grey p-4 rounded-lg cursor-pointer shadow-task max-w-[280px]">
        <h3 class="text-black dark:text-white font-bold group-hover:text-main-purple select-none">
            {{ card.title }}
        </h3>
        <p class="text-xs text-medium-grey font-bold select-none">
            {{ card.description }}
        </p>

        <!-- Start: Modals-->
        <modal :name="'card-modal-' + card.id" :width="'40%'" :height="'50%'" :adaptive="true">
            <form class="bg-white dark:bg-dark-grey rounded-lg p-1">
                <div class="p-5 pr-3 flex flex-col gap-6 max-h-[90vh] overflow-y-scroll">
                    <div class="flex justify-between items-center">
                        <h4 class="text-black dark:text-white font-bold text-lg">Edit {{ card.title }}</h4>
                        <!-- Delete card btn -->
                        <button @click="deleteCard(card.id)" type="button" class="text-red-500 hover:text-red-600">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <div class="text-white relative flex flex-col gap-2 w-full">
                        <label for="Title" class="text-medium-grey dark:text-white text-xs font-bold">Title</label>
                        <input v-model="card.title" type="text" placeholder="e.g. Take coffee break" id="Title" class="peer px-4 py-2 text-black dark:text-white dark:bg-dark-grey text-sm rounded transition-colors outline outline-1 outline-medium-grey/25 cursor-pointer hover:outline-main-purple focus:outline-main-purple placeholder:text-black/25 dark:placeholder:text-white/25">
                    </div>

                    <div class="text-white relative flex flex-col gap-2">
                        <label for="Description" class="text-medium-grey dark:text-white text-xs font-bold">Description</label>
                        <textarea v-model="card.description" placeholder="e.g. It’s always good to take a break. This 15 minute break will  recharge the batteries a little." rows="4" id="Description" class="resize-none px-4 py-2 text-black dark:text-white dark:bg-dark-grey text-sm rounded transition-colors outline outline-1 outline-medium-grey/25 cursor-pointer hover:outline-main-purple focus:outline-main-purple placeholder:text-black/25 dark:placeholder:text-white/25"></textarea>
                    </div>
                    <button @click="saveCard" type="button" class="w-full text-sm font-bold py-2.5 px-4 rounded-3xl text-white bg-main-purple hover:bg-main-purple-light">
                        Save Changes 
                        <i v-show="isLoading" class="fas fa-spinner fa-spin ml-2"></i>
                    </button>
                </div>
            </form>
        </modal>
        <!-- End: Modals-->
    </article>
</template>

<script>
export default {
    props: {
        card: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            isLoading: false
        }
    },

    methods: {
        openModal(id) {
            this.$modal.show('card-modal-' + id)
        },

        saveCard() {
            this.isLoading = true

            axios.put('/api/cards/' + this.card.id, {
                title: this.card.title,
                description: this.card.description
            })
            .then(response => {
                this.$modal.hide('card-modal-' + this.card.id)
                this.$modal.show('dialog', {
                    title: 'Success',
                    text: 'Card updated successfully',
                    buttons: [
                        {
                            title: 'Ok',
                            handler: () => {
                                this.$modal.hide('dialog')
                            }
                        }
                    ]
                })
            })
            .catch(error => {
                this.$modal.show('dialog', {
                    title: 'Error',
                    text: 'Something went wrong',
                    buttons: [
                        {
                            title: 'Ok',
                            handler: () => {
                                this.$modal.hide('dialog')
                            }
                        }
                    ]
                })
                console.log(error)
            })
            .finally(() => {
                this.isLoading = false
            })
        },

        deleteCard() {
            this.isLoading = true

            axios.delete('/api/cards/' + this.card.id)
            .then(response => {
                this.$modal.hide('card-modal-' + this.card.id)
                this.$emit('card-deleted', this.card)
            })
            .catch(error => {
                console.log(error)
            })
            .finally(() => {
                this.isLoading = false
            })
        }
    }
}
</script>