<template>
    <div class="container" style="text-align-last: center;">
        <span v-if="toggleAdmin">
             <div class="row">
            <div class="col-lg-16">
                <h1><textarea id="textAreaHeading">{{announcement.heading}}</textarea></h1>
                <button type="submit" class="btn-danger"
                        @click="deleteAnnouncement(announcement.id)">Delete announcement
                </button>
                <br/>
                <p class="lead">
                    by <a href="#">{{announcement.name}}</a>
                </p>
                <hr>
                <b><p><span class="glyphicon glyphicon-time"></span>{{announcement.created_at}}</p></b>
                <hr>
                <p class="lead">
                <p><textarea rows="10" cols="50" id="textAreaBody">{{announcement.body}}</textarea> </p>
                </p>
            </div>
                 <button type="submit" class="btn-primary"
                         @click="changeAnnouncement(announcement.id)"
                 >Update announcement</button>
                 <button type="submit" class="btn-default"
                         @click="saveAnnouncement()">
                     Save annoucement as new announcement
                 </button>
        </div>
        <hr>
            <br/>
            <span class="label-warning" style="color:white;" v-if="error">
                {{error}}
            </span>
            <span class="label-success" style="color:white;" v-if="message">
                {{message}}
            </span>

            <br/>
        <span v-if="visible > 0">
        <button
                class="btn-link"
                @click="previousAnnouncement()">
            Previous
        </button>
        </span>
        <span v-if="visible + 1 < announcements.length">
        <button
                class="btn-link"
                @click="nextAnnouncement()"
        >
            Next
        </button>
    </span>
    </span>
        <span v-else>
        <div class="row">
            <div class="col-lg-16">
                <h1>{{announcement.heading}}</h1>
                                <p class="lead">
                    by <a href="#">{{announcement.name}}</a>
                </p>
                <hr>
                <b><p><span class="glyphicon glyphicon-time"></span>{{announcement.created_at}}</p></b>
                <hr>
                <p class="lead">
                <p>{{announcement.body}} </p>
                </p>
            </div>

        </div>
            <hr>
        <span v-if="visible > 0">
        <button
                class="btn-link"
                @click="previousAnnouncement()">
            Previous
        </button>
        </span>
        <span v-if="visible + 1 < announcements.length">
        <button
                class="btn-link"
                @click="nextAnnouncement()"
        >
            Next
        </button>
        </span>
    </span>
        <br/>
        <span v-if="canToggle">
            <span v-if="toggleAdmin">
            <button type="submit" class="btn-default"
                    @click="toggleAdminView()">Toggle user view</button>
            </span>
            <span v-else>
                <button type="submit" class="btn-default"
                        @click="toggleAdminView()">Toggle admin view</button>
            </span>
        </span>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                announcements: [],
                announcement: null,
                visible: 0,
                error: "",
                isAdmin: false,
                canToggle: false,
                toggleAdmin: false,
                message: "",
            }
        },
        created(){
            axios.get('announcements.json')
                .then(response => {
                    this.announcements = response.data.announcements;
                    this.toggleAdmin = this.canToggle = this.isAdmin = response.data.isAdmin;
                    if (this.announcements.length > 0) {
                        this.announcement = this.announcements[0];
                        this.visible = 0;
                    }
                })
                .catch(function (error) {
                    console.log("Error when retrieving announcements");
                });
            this.checkEmpty();
        },
        methods: {
            changeAnnouncement($id)
            {
                var heading = document.getElementById("textAreaHeading").value;
                var annobody = document.getElementById("textAreaBody").value;

                if (this.validateInput(heading, annobody)) {
                    axios.post('admin/announcements/change', {id: $id, announcementBody: annobody, heading: heading})
                        .then((response) => {
                            this.announcements = response.data;
                            this.announcement = this.announcements[this.visible];
                            this.error = "";
                            this.message = "Announcement has been updated!";
                        });
                }
                this.checkEmpty();
            },
            saveAnnouncement()
            {
                var heading = document.getElementById("textAreaHeading").value;
                var annobody = document.getElementById("textAreaBody").value;

                if (this.validateInput(heading, annobody)) {
                    axios.post('admin/announcements/save', {announcementBody: annobody, heading: heading})
                        .then((response) => {
                            this.announcements = response.data;
                            this.announcement = this.announcements[this.visible];
                            this.error = "";
                            this.message = "New announcement has been created!";
                        });
                }
                this.checkEmpty();
            },
            validateInput($heading, $body)
            {
                if ($heading.length < 4) {
                    this.error = "Heading should be at least 4 character long";
                    this.message = "";
                    return false;
                }
                if ($body.length < 10) {
                    this.error = "Body should be at least 10 characters long";
                    this.message = "";
                    return false;
                }
                return true;
            },
            nextAnnouncement()
            {
                this.visible = this.visible + 1;
                this.announcement = this.announcements[this.visible];
                this.error = "";
                this.message = "";
            },
            previousAnnouncement()
            {
                if (this.visible > 0) {
                    this.visible = this.visible - 1;
                    this.announcement = this.announcements[this.visible];
                    this.error = "";
                    this.message = "";
                }
            },
            toggleAdminView()
            {
                this.toggleAdmin = !this.toggleAdmin;
                this.error = "";
                this.message = "";
            },
            deleteAnnouncement($id)
            {
                axios.post('admin/announcements/delete', {id: $id})
                    .then((response) => {
                        this.announcements = response.data;
                        this.previousAnnouncement();
                        this.message = "Announcement has been deleted!";
                        this.checkEmpty();
                    });
            },
            checkEmpty()
            {
                if (this.announcements.length === 0) {
                    this.announcement = {
                        "heading": "There are no announcements!",
                        "body": "Empty",
                        "created_at": " "
                    }
                }
            }
        }
    }
</script>