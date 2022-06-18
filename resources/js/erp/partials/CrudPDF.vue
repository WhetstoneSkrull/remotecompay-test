<template>
    <div class="col-lg-8 offset-md-2">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="p-t-10 searchBy-name">Add PDF File</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">Title {{pdf.title}} </label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="pdf.title"
                        />
                    </div>

                    <div class="form-group col-md-12">
                        <label for="exampleFormControlFile1"
                            >Example file input</label
                        >
                        <input
                            type="file"
                            class="form-control-file"
                            id="exampleFormControlFile1"
                            accept="application/pdf"
                            v-on:change="attachPDF"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-info btn-block" @click="addForm">
                        Submit <i class="fe fe-send"></i>
                    </button>
                </div>

                <div class="row">
                    <p class="h6"> {{pdfs.length}} Added </p>
                    <p v-for="pdf in pdfs" v-bind:key="pdf.id">
                           <strong>  {{pdf.title}}, </strong>  
                           <span class="font-weight-light"> {{pdf.file}} </span>
                           <button class="btn btn-outline-dark btn-sm"><i class="fe fe-edit"></i> </button>
                           <button class="btn btn-outline-danger  btn-sm"><i class="fe fe-x"></i> </button>
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
            pdf: {
                title: "",
                file: "",
            },
            pdfs: "",
            edit: false
        };
    },
    methods: {
       
        attachPDF(event) {
            console.log(event);
            this.pdf.file = event.target.files[0];
        },
        addForm() {
            var formData = new FormData();
            formData.append("file", this.pdf.file);
            formData.append("title", this.pdf.title);
            axios.post("/api/pdfs", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                }).then((response) => {
                    console.log(response);
                    this.$toasted.global.crudAdded().goAway(1500);

                      this.fetchAll();
                });
                
                
        },

          fetchAll() {
            axios
                .get(`api/pdfs`)
                .then((response) => {
                    console.log(response);
                    this.pdfs = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
    created(){
        this.fetchAll()
    }
};
</script>
