<template>
    <div class="form-group">
        <label>{{ label }}</label>
        <div class="input-group mb-3" :class="{ 'is-invalid': error }">
            <div class="custom-file">
                <input type="file" class="custom-file-input" :class="{ 'is-invalid': error }" :accept="accept" @change="uploadFile">
                <label class="custom-file-label">{{ value }}</label>
            </div>
            <div v-if="canClear" class="input-group-append">
                <button class="btn btn-outline-light" type="button" @click.prevent="uploadedFilePath = ''">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        <div v-show="error" class="invalid-feedback">
            {{ error }}
        </div>
        <input v-if="name" type="hidden" :name="name" :value="uploadedFilePath !== null ? uploadedFilePath : path">
    </div>
</template>

<script>
import { __ } from '~/utils'
import { Form } from 'vform'
import objectToFormData from '../../objectToFormData'

export default {
    props: {
        label: {
            type: String,
            required: true
        },
        path: {
            type: String,
            required: true
        },
        accept: {
            type: String,
            required: false,
            default: 'image/*'
        },
        name: {
            type: String,
            required: false,
            default: ''
        },
        fileName: {
            type: String,
            required: true
        },
        folder: {
            type: String,
            required: true
        },
        canClear: {
            type: Boolean,
            required: false,
            default: false
        },
    },

    data() {
        return {
            error: null,
            form: new Form({
                file: null,
                name: this.fileName,
                folder: this.folder
            }),
            uploadedFilePath: null
        }
    },

    computed: {
        value() {
            return this.form.busy
                ? __('Uploading...')
                : (!this.uploadedFilePath && !this.path || this.uploadedFilePath === ''
                    ? __('Upload a file')
                    : (this.uploadedFilePath || this.path))
        }
    },

    watch: {
        uploadedFilePath(uploadedFilePath) {
            this.$emit('input', uploadedFilePath)
        }
    },

    methods: {
        async uploadFile(event) {
            this.error = null;

            this.form.file = event.target.files[0];

            if (this.form.file) {
                const options = { transformRequest: [(data, headers) => objectToFormData(data)] };

                const { data } = await this.form.submit('post', '/admin/files', options);

                if (data.success) {
                    this.uploadedFilePath = data.path;
                } else {
                    this.error = data.message;
                }
            }
        }
    }
}
</script>
