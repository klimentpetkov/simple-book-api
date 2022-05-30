<template>
<div class="rounded-full border border-gray-400 text-white bg-blue-400 w-10 h-10 flex justify-center items-center">
    {{ userCircle }}
</div>
</template>

<script>
export default {
    name: "UserCircle",

    props: [
        'name',
    ],

    computed: {
        userCircle: function () {
            let names = this.name.split(' ');

            return  names.length === 1
                    ? names[0].slice(0, 2).toUpperCase()
                    : (names[0][0] + names[1][0]).toUpperCase();
        }
    }
}
</script>

<style scoped>

</style>
