<template>
    <section class="admin-content" id="contact-search">
        <Navbar />
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                    <div class="col-md-6 text-center mx-auto text-white p-b-30">
                        <div class="m-b-10"></div>
                        <p class="h3 text-dark">ERPs Manager</p>
                    </div>
                </div>
            </div>
        </div>
        <main class="admin-main">
            <div class="col-md-12 m-b-30">
                <h5>
                    <i class="fe fe-activity"></i> All ERPs
                </h5>
                <div class="table-responsive">
                    <table class="table align-td-middle table-card">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Resource Type</th>
                                <th>Title</th>
                                <th>Description /URL</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(erp, index) in all_erps"
                                v-bind:key="erp.id"
                            >
                                <td>{{ index + 1 }}</td>
                                <td>{{ erp.item_type }}</td>
                                <td>{{ erp.title }}</td>

                                <td>
                                    <span v-if="erp.item_type == 'Snippet'">{{
                                        erp.description
                                    }}</span>
                                    <span v-if="erp.item_type == 'Url'">{{
                                        erp.url_link
                                    }}</span>
                                </td>
                                <td>
                                    <a
                                        v-if="erp.item_type == 'File'"
                                        class="btn btn-outline-info"
                                        name="button"
                                        :href="`/pdfs/${erp.file}`"
                                        download
                                    >
                                        <i class="fe fe-download"></i>
                                    </a>

                                    <a
                                        v-if="erp.item_type == 'Url'"
                                        class="btn btn-outline-info"
                                        name="button"
                                        :href="`${erp.url_link}`"
                                        :target="erp.open_type"
                                    >
                                        <i class="fe fe-link"></i>
                                    </a>

                                    <button
                                        v-if="erp.item_type == 'Snippet'"
                                        class="btn btn-outline-info"
                                        name="button"
                                        @click="copyText(erp)"
                                       
                                    >
                                        <i class="fe fe-copy"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>
</template>

<script>
import Navbar from "./partials/Navbar.vue";

export default {
    components: {
        Navbar,
    },
    data() {
        return {
            all_erps: "",
        };
    },
    beforeMount() {
        axios
            .get(`api/erps`)
            .then((response) => {
                console.log(response);
                this.all_erps = response.data;
            })
            .catch((error) => {
                console.error(error);
            });
    },
    methods: {
        copyText(erp) {
            const copyToClipboard = (text) =>
                navigator.clipboard.writeText(text);
            copyToClipboard(erp.snippet);
            this.$toasted.info("Copied to clipboard", {
                position: "top-center",
                duration: 3000,
            });
        },
    },
};
</script>
