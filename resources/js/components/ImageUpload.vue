<template>
    <div class="pb-4">
        <label
            :for="name"
            class="text-blue-500 pt-2 uppercase text-xs font-bold"
        >{{ this.label }}</label>

        <input
            :id="name"
            type="file"
            class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100"
            @change="onFileSelected"
        />

        <p
            class="text-red-600 text-sm"
            v-text="errorMessage()"
        >Error Here</p>
    </div>
</template>

<script>
export default {
    name: 'ImageUpload',

    props: [
        'name',
        'label',
        'errors'
    ],

    data() {
        return {
            selectedFile: null
        }
    },

    computed: {
        hasError: function () {
            return  this.errors
                    && this.errors[this.name]
                    && this.errors[this.name].length > 0;
        }
    },

    methods: {
        onFileSelected(event) {
            this.selectedFile = event.target.files[0];
            this.clearErrors(this.name);

            this.$emit('update:field', this.selectedFile);
        },

        errorMessage: function () {
            if (this.hasError) {
                return this.errors[this.name][0];
            }
        },

        clearErrors: function () {
            if (this.hasError) {
                this.errors[this.name] = null;
            }
        },
    }
}
</script>

<style scoped>

</style>
