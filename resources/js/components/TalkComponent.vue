<template>
    <div id="talks-inner">
        <div id="talks-contents" class="talks-contents">
            <template v-if="talks.length">
                <template v-for="(talk, key) in talks">
                    <div :key="key" :class="[talk.from_user_id == id ? 'from' : 'to']">
                        <div class="talk-img">
                            <img :src="talk.from_user.image" >
                        </div>
                        <div class="message">{{ talk.message }}</div>
                    </div>
                </template>
            </template>
            <template v-else>
                <p class="talk-start">トークをはじめましょう！</p>
            </template>
        </div><!-- .talks-contents -->
        <form @submit.prevent class="message-form">
            <div class="input-group">
                <textarea type="text" name="message" id="message" placeholder="メッセージ" v-model="message" class="form-control message-textarea" ></textarea>
                <button type="submit" @click="toTalk" class="btn btn-primary message-btn"><i class="fas fa-paper-plane"></i></button>
            </div><!-- .input-group -->
        </form><!-- .message-form -->
    </div>
</template>

<script>
    const axios = require('axios')

    export default {
        name: "TalkComponent",
        data: function(){
            return {
                talks: [],
                message: "",
                count: 0,
            }
        },
        props: {
            id: {
                type: Number,
                required: true,
            }
        },
        created() {
            console.log('Component created.')
        },
        async mounted() {
            // トーク取得
            await this.getTalks()
            setInterval(this.getTalks, 3000)

            this.scrollBottom()

            console.log('Component mounted.')
        },
        updated() {
            console.log('Component updated')
        },
        methods: {
            getTalks: async function(){
                await axios.get('/chat/talk_list/' + this.id).then(res => {
                    console.log(res)
                    this.talks = res.data
                }).catch(e => {
                    console.log(e)
                })
            },
            toTalk: async function(){
                await axios.post('/chat/store/' + this.id, {message: this.message}).then(res => {
                    console.log(res)
                    this.talks = res.data.response
                    this.message = ""
                }).catch(e => {
                    console.log(e)
                })
                this.scrollBottom()
            },
            scrollBottom: function(){
                let target = document.getElementById('talks-inner')
                target.scrollIntoView(false)
            }
        },
    }
</script>
