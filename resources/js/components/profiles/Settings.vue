<script>
import axios from "axios";

export default {
    name: "settings",
    props: ["profile"],
    data() {
        return {
            active: this.profile.share_profile,
            datos: {},
            message: '',
            prof: {
                share_profile: this.profile.share_profile,
                share_name: this.profile.share_name,
                share_about: this.profile.share_about,
                share_email: this.profile.share_email,
                share_phone: this.profile.share_phone
            }
        };
    },
    methods: {
        shareProperties(val){
            if (val == 1){
                this.datos = {
                    share_profile: 1,
                    share_name: 0,
                    share_about: 0,
                    share_email: 0,
                    share_phone: 0
                };
                this.active = 1;
                this.message = "Profile has been updated, Other properties has been release"
            } else {
                this.datos = {
                    share_profile: 0,
                    share_name: 0,
                    share_about: 0,
                    share_email: 0,
                    share_phone: 0
                };
                this.active = 0;
                this.message = "Profile has been updated, Other properties has been locked!!"
            }

            axios
                .put("/profile", this.datos)
                .then(resp => {
                    $(".toast-body").html(
                        this.message
                    );
                    $(".toast").toast({
                        type: "success",
                        delay: 3000
                    });

                    $(".toast")
                        .toast("show")
                        .removeClass("bg-danger")
                        .addClass("bg-success");
                })
                .catch(err => {
                    $(".toast-body").html("There is an error on update!!");
                    $(".toast")
                        .toast({
                            type: "info",
                            delay: 3000
                        })
                        .toast("show")
                        .removeClass("bg-success")
                        .addClass("bg-danger");
                    this.edit = false;
                });

        },

        UpdateProperty(val) {

            axios
                .put("/profile", this.prof)
                .then(resp => {
                    console.log(resp);
                    $(".toast-body").html(
                        "The permission on Social Media has been updated"
                    );
                    $(".toast").toast({
                        type: "success",
                        delay: 3000
                    });

                    $(".toast")
                        .toast("show")
                        .removeClass("bg-danger")
                        .addClass("bg-success");
                })
                .catch(err => {
                    $(".toast-body").html("There is an error on update!!");
                    $(".toast")
                        .toast({
                            type: "info",
                            delay: 3000
                        })
                        .toast("show")
                        .removeClass("bg-success")
                        .addClass("bg-danger");
                    this.edit = false;
                });
        },

        toData(val) {
            if (val === true) {
                return 1;
            } else {
                return 0;
            }
        },
        toBoolean(val) {
            if (val === 0) {
                return false;
            } else {
                return true;
            }
        }
    }
};
</script>
