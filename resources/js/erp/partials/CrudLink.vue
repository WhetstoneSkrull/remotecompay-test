<template>
    <div class="col-lg-8 offset-md-2">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="p-t-10 searchBy-name">Add URL</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="links.title"
                        />
                    </div>

                    <div class="form-group col-md-12">
                        <label>Url </label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="links.url_link"
                        />
                    </div>

                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="exampleCheck1"
                            v-model="links.is_open_in_new_tab"
                        />
                        <label class="form-check-label" for="exampleCheck1"
                            >Check to open link in new tab
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-info btn-block" @click="addForm">
                        Submit <i class="fe fe-send"></i>
                    </button>
                </div>

                <div class="row">
                    <p class="h6">{{ url_links.length }} Added</p>

                    <p v-for="link in url_links" v-bind:key="link.id">
                        <strong> {{ link.title }}, </strong>
                        <span class="font-weight-light">
                            {{ link.url_link }}
                        </span>
                        <button class="btn btn-outline-dark btn-sm">
                            <i class="fe fe-edit" @click="editLink(link)"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="fe fe-x" @click="deleteLink(link)"></i>
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            links: {
                title: "",
                url_link: "",
                is_open_in_new_tab: false,
            },
            url_links: "",
            link_id: "",
            edit: false,
        };
    },
    methods: {
        addForm() {
            if (this.edit == false) {
                axios
                    .post(`api/url_links`, this.links)
                    .then((response) => {
                        console.log(response);
                        this.$toasted.global.crudAdded().goAway(1500);
                        this.fetchAll();
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            } else {
                axios
                    .put(`api/url_links/${this.link_id}`, this.links)
                    .then((response) => {
                        console.log(response);
                        this.$toasted.global.crudAdded().goAway(1500);
                        this.fetchAll();
                        this.edit = false;
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }
        },
        fetchAll() {
            axios
                .get(`api/url_links`)
                .then((response) => {
                    console.log(response);
                    this.url_links = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        editLink(link) {
            this.edit = true;
            this.link_id = link.id;
            this.links.title = link.title;
            this.links.url_link = link.url_link;
            this.links.is_open_in_new_tab = link.is_open_in_new_tab;
        },
        deleteLink(link) {
            if (confirm("Are you Sure?")) {
                axios
                    .delete(`api/url_links/${link.id}`)
                    .then((response) => {
                        console.log(response);
                        this.$toasted.global.crudAdded().goAway(1500);
                        this.fetchAll();
                        this.edit = false;
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }
        },
    },
    created() {
        this.fetchAll();
    },
};
</script>
