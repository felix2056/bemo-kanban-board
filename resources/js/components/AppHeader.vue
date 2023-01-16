<template>
    <header class="bg-white dark:bg-dark-grey top-0 left-0 w-full flex items-center sm:pr-4">
        <div
            class="hidden items-center sm:flex pl-6 h-20 border-r border-r-lines-light dark:border-r-lines-dark md:h-24 min-w-[200px]">
            <img class="hidden dark:block" src="/images/logo_156x26.webp" alt="logo">
            <img class="dark:hidden" src="/images/logo_156x26.webp" alt="logo">
        </div>
        <div class="mx-auto max-w-sm w-11/12 flex items-center h-16 gap-4 sm:h-20">
            <div>
                <img class="sm:hidden" src="/images/logo_156x26.webp" height="25" width="24" alt="logo">
            </div>
            <div class="flex items-center gap-2 group cursor-pointer sm:hidden">
                <h1 class="text-black dark:text-white font-bold text-lg cursor-pointer">Bemo Kanban Board</h1>
                <div><svg width="10" height="7" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="#635FC7" stroke-width="2" fill="none" d="m1 1 4 4 4-4"></path>
                    </svg>
                </div>
            </div>
            <h1 class="text-black dark:text-white font-bold hidden text-2xl sm:block">Bemo Developer Functional Test | Kanban Board</h1>
            <div class="flex items-center gap-4 ml-auto">
                <div class="sm:hidden min-w-[48px]">
                    <button type="button"
                        class="text-white text-sm font-bold py-2.5 px-4.5 rounded-3xl bg-main-purple hover:bg-main-purple-light disabled:bg-main-purple disabled:bg-opacity-20">
                        <img src="/assets/icon-add-task-mobile.2d3799f1.svg" alt="">
                    </button>
                </div>
                <div class="hidden sm:block">
                    <button @click="exportDB" type="button" class="hidden sm:block text-white text-sm font-bold py-3 px-4 rounded-3xl bg-main-purple hover:bg-main-purple-light">
                        <span v-if="isExportingDB">Exporting <i class="fas fa-spinner fa-spin"></i></span>
                        <span v-else>Export DB</span>
                    </button>
                </div>
                <div tabindex="1" class="group cursor-pointer relative">
                    <div><svg class="fill-medium-grey" width="5" height="20" xmlns="http://www.w3.org/2000/svg">
                            <g fill-rule="evenodd">
                                <circle cx="2.308" cy="2.308" r="2.308"></circle>
                                <circle cx="2.308" cy="10" r="2.308"></circle>
                                <circle cx="2.308" cy="17.692" r="2.308"></circle>
                            </g>
                        </svg>
                    </div>
                    <div class="absolute right-28 top-8 hidden group-focus:block">
                        <div class="bg-white dark:bg-very-dark-grey rounded-lg text-sm w-36 flex flex-col fixed z-10">
                            <p class="text-medium-grey text-xs font-bold w-full p-4">Edit Board</p>
                            <p class="text-red text-xs font-bold w-full p-4">Delete Board</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'AppHeader',
    data() {
        return {
            isExportingDB: false
        }
    },

    methods: {
        exportDB() {
            this.isExportingDB = true

            axios.post('/api/export-db')
            .then(response => {
                this.$modal.show('dialog', {
                    title: 'Success',
                    text: 'Database exported successfully. Click Ok to download.',
                    buttons: [
                        {
                            title: 'Ok',
                            handler: () => {
                                window.location.href = '/api/download-db'
                            }
                        }
                    ]
                })
            })
            .catch(error => {
                this.$modal.show('dialog', {
                    title: 'Error',
                    text: 'Something went wrong. Please try again.',
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
                this.isExportingDB = false
            })
        }
    }
}
</script>