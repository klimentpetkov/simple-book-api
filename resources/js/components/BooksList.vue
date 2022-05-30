<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div v-if="!books || books.length === 0">
                <p>
                    No Books yet. <span v-if="user.is_author == 1">
                        <router-link to="/books/publish">Get Started ></router-link>
                    </span>
                </p>
            </div>

            <div v-for="book in books" :key="book.data.id">
                <router-link :to="'/books/' + book.data.id" class="flex items-center border-b border-gray-400 p-4 hover:bg-gray-100">
                    <div class="flex">
                        <div class="flex flex-col flex-0">
                            <img class="w-24 h-24 rounded" :src="book.data.cover">
                        </div>
                        <div class="flex flex-col flex-1 pl-4">
                            <p class="text-blue-400 font-bold">{{ book.data.title }}</p>
                            <p class="text-gray-600">{{ book.data.description }}</p>
                            <p>by {{ book.data.author.name }} ({{ book.data.author.email }})</p>
                        </div>
                    </div>
                </router-link>
            </div>

            <tailable-pagination
                :data="paginationBooks"
                :showNumbers="true"
                @page-changed="getResults"
                />
        </div>
    </div>
</template>

<script>
export default {
    name: "BooksList",

    inject: ['user'],

    props: [
        'endpoint',
    ],

    data: function () {
        return {
            loading: true,
            books: null,
            paginationBooks: {},
            limit: 5
        }
    },

    mounted() {
        this.getResults();
    },

    methods: {
        getResults(page = 1) {
            axios.get(this.endpoint + `?page=${page}`)
            .then(response => {
                this.books = response.data.data;
                this.paginationBooks = response.data;

                this.loading = false;
            })
            .catch(error => {
                this.loading = false;

                alert('Unable to fetch books.');
            });
        }
    }
}
</script>

<style scoped>

</style>