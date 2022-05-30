<template>
    <BooksList endpoint="/api/books" />
</template>

<script>

import BooksList from '../components/BooksList';

export default {
    name: "BooksIndex",

    components: {
        BooksList
    }
}
</script>

<style scoped>

</style>