<template>
    <div class="col-lg-8 offset-md-2">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="p-t-10 searchBy-name">Add Code Snippet</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="snippet.title"
                        />
                    </div>

                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea
                            class="form-control"
                            rows="5"
                            v-model="snippet.description"
                        ></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Snippet</label>
                        <textarea
                            class="form-control"
                            rows="5"
                            v-model="snippet.snippet"
                        ></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-info btn-block" @click="addForm">
                        Submit <i class="fe fe-send"></i>
                    </button>
                </div>

                <div class="row">
                    <p class="h6"> {{snippets.length}} Added </p>
                    <p v-for="snip in snippets" v-bind:key="snip.id">
                        <strong> {{ snip.title }}, </strong>
                        <span class="font-weight-light">
                            {{ snip.description }}
                        </span>
                        <button class="btn btn-outline-dark btn-sm">
                            <i
                                class="fe fe-edit"
                                @click="editSnippet(snip)"
                            ></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="fe fe-x" @click="deleteSnippet(snip)"></i>
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
            snippet: {
                title: "",
                description: "",
                snippet: "",
            },
            snippets: "",
            snippet_id: "",
            edit: false,
        };
    },
    methods: {
        addForm() {
            if (this.edit == false) {
                axios
                    .post(`api/snippets`, this.snippet)
                    .then((response) => {
                        console.log(response);
                        this.$toasted.global.crudAdded().goAway(1500);
                         this.fetchAll()
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            } else {
                axios
                    .put(`api/snippets/${this.snippet_id}`, this.snippet)
                    .then((response) => {
                        console.log(response);
                        this.$toasted.global.crudAdded().goAway(1500);
                        this.fetchAll()
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }
        },

        fetchAll() {
            axios
                .get(`api/snippets`)
                .then((response) => {
                    console.log(response);
                    this.snippets = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        editSnippet(snip) {
            this.edit = true;
            this.snippet_id = snip.id;
            this.snippet.title = snip.title;
            this.snippet.description = snip.description;
            this.snippet.snippet = snip.snippet;
        },
        deleteSnippet(snip) {
            if (confirm("Are you Sure?")) {
                axios
                    .delete(`api/snippets/${snip.id}`)
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
