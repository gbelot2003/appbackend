<script>
import axios from "axios";

export default {
    name: "password",
    data() {
        return {
            datos: {
                password: "",
                password_confirmation: ""
            }
        };
    },
    methods: {
        onSubmit(event) {
            event.preventDefault();
            axios
                .put("/profile", this.datos)
                .then(res => {
                    console.log(res);
                    $(".toast-body").html(
                        "The information on Social Media has been updated"
                    );
                    $(".toast").toast({
                        type: "info",
                        delay: 3000
                    });

                    $(".toast")
                        .toast("show")
                        .removeClass("bg-danger")
                        .addClass("bg-success");
                })
                .catch(err => {
                    $(".toast-body").html(
                        "There is a problem with your password information"
                    );
                    $(".toast").toast({
                        type: "info",
                        delay: 3000
                    });

                    $(".toast")
                        .toast("show")
                        .removeClass("bg-success")
                        .addClass("bg-danger");
                });
        }
    }
};
</script>
