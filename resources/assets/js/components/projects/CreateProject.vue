<template>
    <div class="container">

        <div class="">

            <div class="col-md-10">

                <img id="image-holder" src="/img/placeholder.png" alt="..." style="max-width: 75%; height: 200px;"/>

                <div>
                    <form role="form" enctype="multipart/form-data" v-on:submit.prevent="addProject">

                        <div class="form-group">
                            <div class="input-file-container">
                                <input class="input-file" id="image" type="file" @change="loadImage($event)">
                                <label tabindex="0" for="image" class="input-file-trigger">Select a file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-6">Name</label>


                            <input id="name" type="text" class="form-control" v-model="ideator.name"
                                   value="" required>

                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-6">Description</label>

                            <textarea id="description" type="text" class="form-control" v-model="ideator.description"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary form">
                            Save
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
    export default {

        data() {
            return {
                ideator: {}
            }
        },

        methods: {
            addProject() {
                let uri = '/api/ideator';

                const formData = new FormData();
                formData.append('image', this.ideator.image);
                formData.append('name', this.ideator.name);
                formData.append('description', this.ideator.description);
                formData.append('mentor_id', this.$route.params.id);


                this.axios.post(uri, formData).then((response) => {
                    console.log(response)
                    this.$router.push({name: 'ShowMentor', params: {id: this.$route.params.id}})
                });
            },

            loadImage(event) {
                this.ideator.image = event.target.files[0]

                if (event.target.files && event.target.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function (e) {
                        // $('#image-holder').show();
                        $('#image-holder').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(event.target.files[0]);
                }
            }
        },


    }


</script>

<style scoped>

</style>