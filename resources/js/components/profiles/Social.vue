<script>
import axios from "axios";

export default {
    name: "social",
    props: ["links"],
    data() {
        return {
            profile: {
                field_facebook: this.links.field_facebook,
                field_instagram: this.links.field_instagram,
                field_linkedin: this.links.field_linkedin,
                field_twitter: this.links.field_twitter
            }
        };
    },
    methods: {
        onSubmit(event) {
            event.preventDefault();
            axios.put("/profile", this.profile).then(res => {
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
            });
        }
    }
};
</script>
