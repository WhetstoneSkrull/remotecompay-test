<template>
    <section class="admin-content" id="contact-search">
        <Navbar />

        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                    <div class="col-md-6 text-center mx-auto text-white p-b-30">
                        <div class="m-b-10">
                           
                        </div>
                        <p class="h3 text-dark">Admin Manager</p>
                    </div>
                </div>
            </div>
        </div>

        <section class="">
            <div class="container">
                <div class="row list">
                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <button
                                    type="button"
                                    class="btn btn-info spacer"
                                    @click="showpdf = !showpdf"
                                >
                                  PDF <i class="fe fe-file-text"></i>
                                </button>

                                <button
                                    type="button"
                                    class="btn btn-info spacer"
                                    
                                    @click="showlink = !showlink"
                                >
                                 Link <i class="fe fe-link"></i>
                                </button>

                                <button
                                    type="button"
                                    class="btn btn-info spacer"
                                   
                                    @click="showsnippet = !showsnippet"
                                >
                                 Code Snippet <i class="fe fe-codepen"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div v-show="showsnippet">
                        <CrudSnippet />
                    </div>

                    <div v-show="showlink">
                    <CrudLink/>
                     </div>

                      <div v-show="showpdf">
                    <CrudPDF/>
                     </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
import Navbar from "./partials/Navbar.vue";
import CrudSnippet from "./partials/CrudSnippet.vue";
import CrudLink from "./partials/CrudLink.vue";
import CrudPDF from "./partials/CrudPDF.vue";

export default {
    components: {
        Navbar,
        CrudSnippet,
        CrudLink, CrudPDF
    },
    data() {
        return {
            showlink: false,
            showpdf: true,
            showsnippet: false,
        };
    },
};
</script>
<style scoped>
.spacer{
    margin-left:2px;
    margin-right:2px;
    margin-top:2px;
    margin-bottom:2px;
}
</style>
