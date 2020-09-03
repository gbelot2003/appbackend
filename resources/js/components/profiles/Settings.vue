<script>
import axios from "axios";

export default {
    name: "settings",
    props: ["profile"],
    data() {
        return {
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
        UpdateProperty() {
            axios.put("/profile", this.prof).then(resp => {
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
