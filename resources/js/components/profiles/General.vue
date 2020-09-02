<script>
import Images from "./Images";
import axios from "axios";

export default {
    name: "general",
    props: {
        user: Object,
        countries: Object,
        cities: Object
    },
    data() {
        return {
            dcountries: this.countries,
            dcities: this.cities,
            hidden: true,
            person: {
                name: this.user.name,
                email: this.user.email,
                alias: this.user.profile.alias,
                phonefield: this.user.phonefield,
                about: this.user.profile.about,
                country: this.user.profile.country_id,
                city: this.user.profile.city_id
            }
        };
    },
    components: { Images },
    methods: {
        onSubmit(event) {
            event.preventDefault();
            axios.put("/profile", this.person).then(res => {
                console.log(res);
                $(".toast-body").html("The General info has been updated");
                $(".toast").toast({
                    type: "info",
                    delay: 3000
                });

                $(".toast")
                    .toast("show")
                    .removeClass("bg-danger")
                    .addClass("bg-success");
            });
        },
        seachCities(val) {
            axios.get("/cities-per-country/" + val).then(res => {
                this.dcities = res.data;
                $(".toast-body").html("The city alternatives has been updated");
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

<style></style>
