<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="flex justify-between">
                <a href="#" class="text-blue-400" @click="$router.back()">
                    &lt; Back
                </a>
                <div class="relative">
                    <span v-if="user.id == book.author.id">
                        <!-- <router-link
                            :to="'/books/' + book.id + '/edit'"
                            class="px-4 py-2 rounded text-green-500 border border-green-500 text-sm font-bold mr-2"
                        >Edit</router-link> -->
                        <a
                            href="#"
                            class="px-4 py-2 border border-red-500 rounded text-sm font-bold text-red-500"
                            @click="modal = ! modal"
                        >Delete</a>
                    </span>

                    <div v-if="modal" class="absolute bg-blue-900 text-white rounded-lg z-20 p-8 w-64 right-0 mt-2 mr-6">
                        <p>Confirm record deletion!</p>

                        <div class="flex items-center mt-6 justify-end">
                            <button
                                class="text-white pr-4"
                                @click="modal = ! modal"
                            >Cancel</button>
                            <button
                                class="px-4 py-2 bg-red-500 rounded text-sm font-bold text-white"
                                @click="destroy"
                            >Delete</button>
                        </div>
                    </div>
                </div>
                <div
                    v-if="modal"
                    class="bg-black opacity-25 absolute right-0 left-0 top-0 bottom-0 z-10"
                    @click="modal = ! modal"
                ></div>
            </div>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Title</p>
            <p class="pt-2 text-blue-400">{{ book.title }}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Description</p>
            <p class="pt-2 text-blue-400">{{ book.description }}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Cover</p>
            <div class="flex">
                <img
                    class="object-cover h-48 w-96"
                    :src="book.cover"
                    :alt="book.title" />
            </div>
            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Publication details</p>
            <p class="pt-2 text-gray-600">
                Published on: <span class="text-blue-500">{{ book.published_at }}</span>
                by <span class="text-blue-500">{{ book.author.name }} ({{ book.author.email }})</span>
            </p>
        </div>

    </div>
</template>

<script>
export default {
    name: "BooksShow",

    inject: ['user'],

    data: function () {
        return {
            loading: true,
            modal: false,
            book: null
        }
    },

    mounted() {
        axios.get('/api/books/' + this.$route.params.id)
            .then(response => {
                this.book = response.data.data;

                this.loading = false;
            })
            .catch(error => {
                this.loading = false;

                if (error.response.status === 404) {
                    this.$router.push('/books');
                }
            });
    },

    methods: {
        destroy: function () {
            axios.delete('/api/books/' + this.$route.params.id)
                .then(response => {
                    this.$router.push('/books');
                })
                .catch(error => {
                    alert('Internal Error. Unable to delete book.');
                });
        }
    }
}
</script>

<style scoped>

</style>