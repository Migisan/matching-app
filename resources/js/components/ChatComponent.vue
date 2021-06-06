<template>
    <div>
        <ul v-for="(matchedUser, key) in matchedUsers" :key="key">
            <li class="py-2">
                <a :href="'/chat/talk/' + matchedUser.to_user.id">
                    <img :src="matchedUser.to_user.image" class="rounded-circle" style="height: 70px; width: 70px; object-fit: cover;">
                    <span class="stretched-lik ml-3" style="font-size: 16px;">{{ matchedUser.to_user.name }}</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    const axios = require('axios')

    export default {
        name: "ChatComponent",
        data: function(){
            return {
                matchedUsers: null
            }
        },
        mounted() {
            this.getMatchedUsers()
            console.log('Component mounted.')
        },
        methods: {
            getMatchedUsers: function(){
                axios.get('/chat/list').then(res => {
                    console.log(res)
                    this.matchedUsers = res.data
                }).catch(e => {
                    console.log(e)
                })
            },
        },
    }
</script>
