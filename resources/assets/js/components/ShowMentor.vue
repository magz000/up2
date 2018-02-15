<template>
    <div class="container">
        <!--<router-link class="btn btn-primary pull-right" :to="{name: 'Mentors'}">Back</router-link>-->
        <div class="row">
            <a class="btn btn-primary pull-right" id="comments" @click="goBack">Back</a>
        </div>

        <div class="row" style="padding: 20px;">

            <div class="col-md-3" style="margin-bottom: 15px;">
                <div class="_profile-pic"
                     :style="'background-image: url(\'' + (mentor.image != null ? '/img/mentors/' + mentor.image : '/mentor/1/img') + '\'); margin-right: 15px;'">
                </div>
                <!--style="background-image: url('/img/test.png'); margin-right: 15px;"></div>-->

            </div>
            <div class="col-md-9">
                <h2 style="margin-top: 0px; font-weight: bold;">{{mentor.name}}</h2>

                <!--<img src="/img/test.png" style="float: left; height: 100px; margin-right: 10px">-->

                <p style="text-justify: auto"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem
                    tellus, ultricies sit amet ipsum eu,
                    euismod varius elit. Nullam ullamcorper enim quis ipsum lobortis, eget faucibus turpis imperdiet. In
                    hac
                    habitasse platea dictumst. Phasellus mi enim, blandit sit amet quam eu, varius lacinia elit. Sed
                    sollicitudin velit vel tempus molestie. Donec ut consectetur eros. Quisque nec ipsum iaculis,
                    porttitor
                    elit quis, dapibus enim. Morbi efficitur tincidunt ipsum at iaculi.</p>

                <p> Donec et efficitur purus. Proin sapien orci, feugiat at nunc ut, pulvinar cursus ante. Cras sit amet
                    lacus mattis ligula egestas ultrices vitae in sem. Cras sit amet molestie nulla, convallis sodales
                    odio.
                    Curabitur faucibus velit quis arcu tincidunt, vel viverra mauris tincidunt. Morbi nec facilisis
                    ante,
                    nec blandit magna. Aliquam lacus eros, ultricies aliquet pellentesque et, hendrerit sed felis.
                    Quisque
                    ultricies, nisl quis pulvinar sagittis, libero lectus interdum nulla, vel consectetur ligula odio
                    bibendum mauris. In hac habitasse platea dictumst. Etiam quis orci ut augue tempus eleifend.
                    Praesent
                    vitae felis lorem. Cras et dolor arcu. Fusce quis nibh ultricies, mattis eros nec, rutrum eros.
                    Donec
                    venenatis velit in vehicula venenatis. Maecenas molestie aliquam ligula, a volutpat urna consectetur
                    id.
                    Nulla tincidunt urna convallis, maximus nisl at, fermentum nisi.</p>

            </div>

        </div>

        <div class="row">
            <div class="col-md-6" style="margin-top: 20px;">
                <div class="__card" style="height: 270px; padding: 10px; overflow: auto;">
                    <h3 style="margin-top: 0px;">Projects</h3>

                    <ul class="list-project">
                        <li v-for="project in mentor.projects">
                            <router-link :to="{name: 'ShowIdeator', params: {id: project.project.id}}">
                                {{project.project.name}}
                            </router-link>
                        </li>

                    </ul>
                </div>


            </div>

            <div class="col-md-6" style="margin-top: 20px; margin-bottom: 20px;">
                <div class="__card" style="height: 270px; padding: 10px;">

                    <div>
                        <form class="form-horizontal">
                            <h3 style="margin-top: 0px;">Contact</h3>

                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contact" class="col-sm-3 control-label">Contact no.</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="contact" placeholder="Contact no.">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Message</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="message" placeholder="Contact no."></textarea>
                                </div>
                            </div>

                            <div class="row" style="margin-left: 0px; margin-right: 0px;">
                                <button type="submit" class="btn btn-primary form pull-right">
                                    Save
                                </button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        name: "show-mentor",

        data() {
            return {
                mentor: {}
            }
        },
        created: function () {
            this.getItem();
        },

        methods: {
            getItem() {
                let uri = `/api/mentor/${this.$route.params.id}`;
                this.axios.get(uri).then((response) => {
                    this.mentor = response.data;
                });
            },

            goBack() {
                // this.$route.router.go(-1);
                history.back();
            },
        }
    }
</script>
