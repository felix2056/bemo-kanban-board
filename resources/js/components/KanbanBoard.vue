<template>
    <div class="kanban-board">
        <app-header />

        <main>
            <div class="flex w-full">
                <div class="z-10 transition-all fixed translate-x-[-100%]">
                    <div
                        class="bg-white dark:bg-dark-grey min-h-[calc(100vh-80px)] w-64 lg:w-[300px] pb-10 hidden sm:flex sm:flex-col border-r border-r-lines-light dark:border-r-lines-dark">
                        <p class="text-medium-grey text-xs font-bold py-4 px-6">ALL BOARDS (3)</p>
                        <div
                            class="flex items-center gap-4 w-11/12 rounded-r-full px-6 py-3 cursor-pointer text-medium-grey font-bold bg-main-purple text-white fill-white hover:bg-main-purple-light">
                            <div><svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 2.889A2.889 2.889 0 0 1 2.889 0H13.11A2.889 2.889 0 0 1 16 2.889V13.11A2.888 2.888 0 0 1 13.111 16H2.89A2.889 2.889 0 0 1 0 13.111V2.89Zm1.333 5.555v4.667c0 .859.697 1.556 1.556 1.556h6.889V8.444H1.333Zm8.445-1.333V1.333h-6.89A1.556 1.556 0 0 0 1.334 2.89V7.11h8.445Zm4.889-1.333H11.11v4.444h3.556V5.778Zm0 5.778H11.11v3.11h2a1.556 1.556 0 0 0 1.556-1.555v-1.555Zm0-7.112V2.89a1.555 1.555 0 0 0-1.556-1.556h-2v3.111h3.556Z">
                                    </path>
                                </svg></div><span>Platform Launch</span>
                        </div>
                        <div
                            class="flex items-center gap-4 w-11/12 rounded-r-full px-6 py-3 cursor-pointer text-medium-grey font-bold fill-medium-grey hover:text-main-purple hover:fill-main-purple hover:bg-main-purple/10">
                            <div><svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 2.889A2.889 2.889 0 0 1 2.889 0H13.11A2.889 2.889 0 0 1 16 2.889V13.11A2.888 2.888 0 0 1 13.111 16H2.89A2.889 2.889 0 0 1 0 13.111V2.89Zm1.333 5.555v4.667c0 .859.697 1.556 1.556 1.556h6.889V8.444H1.333Zm8.445-1.333V1.333h-6.89A1.556 1.556 0 0 0 1.334 2.89V7.11h8.445Zm4.889-1.333H11.11v4.444h3.556V5.778Zm0 5.778H11.11v3.11h2a1.556 1.556 0 0 0 1.556-1.555v-1.555Zm0-7.112V2.89a1.555 1.555 0 0 0-1.556-1.556h-2v3.111h3.556Z">
                                    </path>
                                </svg></div><span>Marketing Plan</span>
                        </div>
                        <div
                            class="flex items-center gap-4 w-11/12 rounded-r-full px-6 py-3 cursor-pointer text-medium-grey font-bold fill-medium-grey hover:text-main-purple hover:fill-main-purple hover:bg-main-purple/10">
                            <div><svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 2.889A2.889 2.889 0 0 1 2.889 0H13.11A2.889 2.889 0 0 1 16 2.889V13.11A2.888 2.888 0 0 1 13.111 16H2.89A2.889 2.889 0 0 1 0 13.111V2.89Zm1.333 5.555v4.667c0 .859.697 1.556 1.556 1.556h6.889V8.444H1.333Zm8.445-1.333V1.333h-6.89A1.556 1.556 0 0 0 1.334 2.89V7.11h8.445Zm4.889-1.333H11.11v4.444h3.556V5.778Zm0 5.778H11.11v3.11h2a1.556 1.556 0 0 0 1.556-1.555v-1.555Zm0-7.112V2.89a1.555 1.555 0 0 0-1.556-1.556h-2v3.111h3.556Z">
                                    </path>
                                </svg></div><span>Roadmap</span>
                        </div>
                        <div
                            class="flex items-center gap-4 w-11/12 rounded-r-full px-6 py-3 cursor-pointer font-bold fill-main-purple text-main-purple hover:bg-medium-grey/10">
                            <div><svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 2.889A2.889 2.889 0 0 1 2.889 0H13.11A2.889 2.889 0 0 1 16 2.889V13.11A2.888 2.888 0 0 1 13.111 16H2.89A2.889 2.889 0 0 1 0 13.111V2.89Zm1.333 5.555v4.667c0 .859.697 1.556 1.556 1.556h6.889V8.444H1.333Zm8.445-1.333V1.333h-6.89A1.556 1.556 0 0 0 1.334 2.89V7.11h8.445Zm4.889-1.333H11.11v4.444h3.556V5.778Zm0 5.778H11.11v3.11h2a1.556 1.556 0 0 0 1.556-1.555v-1.555Zm0-7.112V2.89a1.555 1.555 0 0 0-1.556-1.556h-2v3.111h3.556Z">
                                    </path>
                                </svg></div><span>+ Create New Board</span>
                        </div>
                        <div class="flex flex-col gap-2 mt-auto">
                            <div
                                class="w-full rounded-md bg-light-grey flex items-center justify-center gap-6 p-4 py-3 dark:bg-very-dark-grey w-10/12 mx-auto">
                                <div class="fill-medium-grey"><svg width="19" height="19"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.167 15.833a.833.833 0 0 1 .833.834v.833a.833.833 0 0 1-1.667 0v-.833a.833.833 0 0 1 .834-.834ZM3.75 13.75a.833.833 0 0 1 .59 1.422l-1.25 1.25a.833.833 0 0 1-1.18-1.178l1.25-1.25a.833.833 0 0 1 .59-.244Zm10.833 0c.221 0 .433.088.59.244l1.25 1.25a.833.833 0 0 1-1.179 1.178l-1.25-1.25a.833.833 0 0 1 .59-1.422ZM9.167 5a4.167 4.167 0 1 1 0 8.334 4.167 4.167 0 0 1 0-8.334Zm-7.5 3.333a.833.833 0 0 1 0 1.667H.833a.833.833 0 1 1 0-1.667h.834Zm15.833 0a.833.833 0 0 1 0 1.667h-.833a.833.833 0 0 1 0-1.667h.833Zm-1.667-6.666a.833.833 0 0 1 .59 1.422l-1.25 1.25a.833.833 0 1 1-1.179-1.178l1.25-1.25a.833.833 0 0 1 .59-.244Zm-13.333 0c.221 0 .433.088.59.244l1.25 1.25a.833.833 0 0 1-1.18 1.178L1.91 3.09a.833.833 0 0 1 .59-1.422ZM9.167 0A.833.833 0 0 1 10 .833v.834a.833.833 0 1 1-1.667 0V.833A.833.833 0 0 1 9.167 0Z">
                                        </path>
                                    </svg></div><label
                                    class="bg-main-purple hover:bg-main-purple-light cursor-pointer min-w-[40px] min-h-[22px] p-1 rounded-xl relative">
                                    <div class="rounded-full h-[14px] w-[14px] bg-white transition-all absolute"></div>
                                    <input class="w-10/12 mx-auto cursor-pointer absolute hidden" type="checkbox">
                                </label>
                                <div class="fill-medium-grey"><svg width="16" height="16"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.474.682c.434-.11.718.406.481.78A6.067 6.067 0 0 0 6.01 4.72c0 3.418 2.827 6.187 6.314 6.187.89.002 1.77-.182 2.584-.54.408-.18.894.165.724.57-1.16 2.775-3.944 4.73-7.194 4.73-4.292 0-7.771-3.41-7.771-7.615 0-3.541 2.466-6.518 5.807-7.37Zm8.433.07c.442-.294.969.232.674.674l-.525.787a1.943 1.943 0 0 0 0 2.157l.525.788c.295.441-.232.968-.674.673l-.787-.525a1.943 1.943 0 0 0-2.157 0l-.786.525c-.442.295-.97-.232-.675-.673l.525-.788a1.943 1.943 0 0 0 0-2.157l-.525-.787c-.295-.442.232-.968.674-.673l.787.525a1.943 1.943 0 0 0 2.157 0Z">
                                        </path>
                                    </svg></div>
                            </div>
                            <div
                                class="cursor-pointer flex items-center gap-2 px-6 py-3 rounded-r-full font-bold text-medium-grey group hover:bg-main-purple/10 dark:hover:bg-white hover:text-main-purple w-11/12">
                                <div class="fill-medium-grey group-hover:fill-main-purple"><svg width="18" height="16"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.522 11.223a4.252 4.252 0 0 1-3.654-5.22l3.654 5.22ZM9 12.25A8.685 8.685 0 0 1 1.5 8a8.612 8.612 0 0 1 2.76-2.864l-.86-1.23A10.112 10.112 0 0 0 .208 7.238a1.5 1.5 0 0 0 0 1.524A10.187 10.187 0 0 0 9 13.75c.414 0 .828-.025 1.239-.074l-1-1.43A8.88 8.88 0 0 1 9 12.25Zm8.792-3.488a10.14 10.14 0 0 1-4.486 4.046l1.504 2.148a.375.375 0 0 1-.092.523l-.648.453a.375.375 0 0 1-.523-.092L3.19 1.044A.375.375 0 0 1 3.282.52L3.93.068a.375.375 0 0 1 .523.092l1.735 2.479A10.308 10.308 0 0 1 9 2.25c3.746 0 7.031 2 8.792 4.988a1.5 1.5 0 0 1 0 1.524ZM16.5 8a8.674 8.674 0 0 0-6.755-4.219A1.75 1.75 0 1 0 12.75 5v-.001a4.25 4.25 0 0 1-1.154 5.366l.834 1.192A8.641 8.641 0 0 0 16.5 8Z">
                                        </path>
                                    </svg></div>
                                <p class="">Hide Sidebar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="relative h-full w-screen min-h-[calc(100vh-64px)] max-h-[calc(100vh-64px)] overflow-auto bg-light-grey dark:bg-very-dark-grey transition-all translate-x-[0]">
                    <div class="mx-auto w-11/12 pt-6 pb-24">
                        <div class="flex">
                            <div class="flex gap-6">
                                <column v-for="column in columns" :key="column.id" :column="column" @card-created="listColumns" @column-deleted="listColumns" @drag-end="moveColumnCards" />
                            </div>
                            <div @click="openModal" class="flex items-center min-h-full pt-11 hidden md:flex">
                                <div
                                    class="h-full flex items-center min-w-[280px] cursor-pointer bg-gradient-to-b from-[#E9EFFA] to-[#E9EFFA]/50 dark:from-dark-grey dark:to-dark-grey/25 rounded-md text-medium-grey hover:text-main-purple">
                                    <p class="text-2xl text-center w-full font-bold select-none">+ New Column</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start: Modals-->
            <modal name="column-modal" :width="'40%'" :height="'50%'" :adaptive="true">
                <form class="bg-white dark:bg-dark-grey rounded-lg p-1">
                    <div class="p-5 pr-3 flex flex-col gap-6 max-h-[90vh] overflow-y-scroll">
                        <div class="flex justify-between items-center">
                            <h4 class="text-black dark:text-white font-bold text-lg">Create Column</h4>
                        </div>
                        <div class="text-white relative flex flex-col gap-2 w-full">
                            <label for="Title" class="text-medium-grey dark:text-white text-xs font-bold">Title</label>
                            <input v-model="title" type="text" placeholder="e.g. Todo" id="Title" class="peer px-4 py-2 text-black dark:text-white dark:bg-dark-grey text-sm rounded transition-colors outline outline-1 outline-medium-grey/25 cursor-pointer hover:outline-main-purple focus:outline-main-purple placeholder:text-black/25 dark:placeholder:text-white/25">
                        </div>
                        <button @click="createColumn" type="button" class="w-full text-sm font-bold py-2.5 px-4 rounded-3xl text-white bg-main-purple hover:bg-main-purple-light">
                            Submit
                            <i v-show="isLoading" class="fas fa-spinner fa-spin ml-2"></i>
                        </button>
                    </div>
                </form>
            </modal>
            <!-- End: Modals-->
        </main>

        <v-dialog />
    </div>
</template>

<script>
// components
import AppHeader from './AppHeader.vue'
import Column from './Column.vue'

export default {
    components: {
        'app-header': AppHeader,
        'column': Column,
    },

    data() {
        return {
            title: '',
            columns: [],

            isLoading: false,
            isDarkMode: false,
        }
    },

    mounted() {
        this.listColumns();
        this.isDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches
    },

    methods: {
        listColumns() {
            axios.get('/api/columns')
            .then(response => {
                this.columns = response.data
            })
        },

        createColumn() {
            this.isLoading = true
            axios.post('/api/columns', {
                title: this.title,
            })
            .then(response => {
                this.listColumns();
                this.$modal.hide('column-modal')
                this.$modal.show('dialog', {
                    title: 'Success',
                    message: 'Column created successfully',
                    type: 'success',
                })
            })
            .catch(error => {
                this.$modal.show('dialog', {
                    title: 'Error',
                    message: 'Something went wrong',
                    type: 'error',
                })
                console.log(error)
            })
            .finally(() => {
                this.isLoading = false
            })
        },

        moveColumnCards() {
            this.columns.forEach(column => {
                column.cards.forEach(card => {
                    axios.put('/api/cards/' + card.id, {
                        column_id: column.id, // new column id
                        order: column.cards.indexOf(card) + 1, // new order
                    })
                })
            });
        },

        openModal() {
            this.$modal.show('column-modal')
        },

        toggleDarkMode() {
            this.isDarkMode = !this.isDarkMode
        },
    },

    watch: {
        isDarkMode(value) {
            if (value) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        },
    },
}
</script>