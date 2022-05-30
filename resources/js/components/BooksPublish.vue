<template>
    <div>
        <form @submit.prevent="submitForm">
            <InputField
                name="title"
                label="Title"
                :errors="errors"
                placeholder="Book title"
                @update:field="form.title = $event" />

            <TextArea
                name="description"
                label="Description"
                :errors="errors"
                placeholder="Book description"
                @update:field="form.description = $event" />

            <ImageUpload
                name="image"
                label="Please choose an image"
                :errors="errors"
                @update:field="form.image = $event" />

            <div class="flex justify-end">
                <button
                    class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700"
                >Cancel</button>
                <button
                    class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400"
                >Publish</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from './InputField';
    import TextArea from './TextArea';
    import ImageUpload from './ImageUpload';

    export default {
        name: "BooksPublish",

        components: {
            InputField,
            TextArea,
            ImageUpload
        },

        inject: ['user'],

        data: function () {
            return {
                form: {
                    'title': '',
                    'description': '',
                    'authorId': this.user.id,
                    'image': null,
                },

                errors: null,
            }
        },

        methods: {
            submitForm: function () {
                let formData = new FormData();

                formData.append('title', this.form.title);
                formData.append('description', this.form.description);
                formData.append('author_id', this.form.authorId);

                if (this.form.image) {
                    formData.append('image', this.form.image, this.form.image.name );
                }

                axios.post(
                    '/api/books',
                    formData
                )
                    .then(response => {
                        this.$router.push(response.data.links.self);
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    });
            }
        }
    }
</script>

<style scoped>

</style>