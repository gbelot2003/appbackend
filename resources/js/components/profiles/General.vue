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
            edit: false,
            person: {
                name: this.user.name,
                email: this.user.email,
                alias: this.user.profile.alias,
                phonefield: this.user.phonefield,
                about: this.user.profile.about,
                country_id: this.user.profile.country_id,
                city_id: this.user.profile.city_id
            }
        };
    },
    components: { Images },
    methods: {
        openEdit(e) {
            e.preventDefault();
            this.edit = true;
        },
        closeEdit(e) {
            e.preventDefault();
            this.edit = false;
        },
        onSubmit(event) {
            event.preventDefault();
            axios
                .put("/profile", this.person)
                .then(res => {
                    $(".toast-body").html("The General info has been updated");
                    $(".toast").toast({
                        type: "info",
                        delay: 3000
                    });

                    $(".toast")
                        .toast("show")
                        .removeClass("bg-danger")
                        .addClass("bg-success");
                    this.edit = false;
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
                });
        },
        seachCities(val) {
            axios.get("/cities-per-country/" + val).then(res => {
                this.dcities = res.data;
                $(".toast-body").html("The city alternatives has been updated");
                $(".toast")
                    .toast({
                        delay: 3000
                    })
                    .catch(err => {
                        $(".toast-body").html("There is an error on update!!");
                        $(".toast")
                            .toast({
                                delay: 3000
                            })
                            .toast("show")
                            .removeClass("bg-success")
                            .addClass("bg-danger");
                    });
            });
        }
    }
};
</script>
