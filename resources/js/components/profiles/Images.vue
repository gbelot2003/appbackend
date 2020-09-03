<template>
    <div class="images row">
        <div class="col-12 col-sm-auto mb-3">
            <div class="mx-auto" style="width: 140px;">
                <div
                    class="d-flex justify-content-center align-items-center"
                    style="height: 140px; background-color: rgb(233, 236, 239);"
                >
                    <img
                        class="img-profile rounded mb-2"
                        :src="showImage"
                        height="120px"
                        width="120px"
                    />
                </div>
            </div>
        </div>

        <div
            class="col d-flex flex-column flex-sm-row justify-content-between mb-3"
        >
            <div class="text-center text-sm-left mb-2 mb-sm-0">
                <div class="mt-2">
                    <input
                        type="file"
                        @change="onFileSelected"
                        style="display:none"
                        ref="fileInput"
                    />
                    <button
                        v-if="hidden"
                        class="btn btn-info"
                        @click="$refs.fileInput.click()"
                    >
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Pick file</span>
                    </button>

                    <button
                        v-if="!hidden"
                        class="btn btn-primary"
                        type="button"
                        @click="onUpload"
                    >
                        <i class="fa fa-fw fa-upload"></i>
                        <span>Change Photo</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Images",
    props: ["image"],
    data() {
        return {
            selectedFile: null,
            hidden: true,
            file: this.image
        };
    },
    methods: {
        onFileSelected(event) {
            this.selectedFile = event.target.files[0];
            this.hidden = false;
        },

        onUpload() {
            const fd = new FormData();
            fd.append("image", this.selectedFile, this.selectedFile.name);
            axios
                .post("/avatar/upload", fd, {
                    onUploadProgress: uploadEvent => {
                        console.log(
                            Math.round(
                                (uploadEvent.loaded / uploadEvent.total) * 100
                            ) + "%"
                        );
                    }
                })
                .then(res => {
                    this.file = res.data;

                    $(".toast-body").html(
                        "Your profile has been updated, The images has been changed"
                    );
                    $(".toast").toast({
                        type: "info",
                        delay: 3000
                    });

                    $(".toast")
                        .toast("show")
                        .removeClass("bg-danger")
                        .addClass("bg-success");
                    this.hidden = true;
                })
                .catch(err => {
                    $(".toast-body").html("There's an error :" + err);
                    $(".toast").toast({
                        delay: 3000
                    });

                    $(".toast")
                        .toast("show")
                        .addClass("bg-danger");
                    this.hidden = true;
                });
        }
    },
    computed: {
        showImage() {
            return `${this.file}`;
        }
    }
};
</script>
