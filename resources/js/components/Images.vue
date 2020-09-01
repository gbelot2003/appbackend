<template>
    <div class="images">
        <input type="file" 
        @change="onFileSelected"
        style="display:none"
        ref="fileInput"
        >
        <button 
        @click="$refs.fileInput.click()"
        >Pick File</button>
        <button class="btn btn-primary" 
        type="button"
        @click="onUpload">
            <i class="fa fa-fw fa-camera"></i>
            <span>Change Photo</span>
        </button>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'Images',
        data(){
            return {
                selectedFile: null,
            }
        },
        methods: {
            onFileSelected(event){
                this.selectedFile = event.target.files[0];
            },
            onUpload(){
                const fd = new FormData();
                fd.append('image', this.selectedFile, this.selectedFile.name);
                axios.post('/avatar/upload', fd, {
                    onUploadProgress: uploadEvent => {
                        console.log(Math.round(uploadEvent.loaded / uploadEvent.total * 100) + '%')
                    }
                })
                .then(res => {
                    console.log(res);
                });    
            }
        }
    }
</script>