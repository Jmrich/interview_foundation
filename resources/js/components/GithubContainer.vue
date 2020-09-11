<template>
  <div>
    <div class="card">
      <div class="card-body">
        <div class="col-sm-12">
          <a href="https://docs.github.com/en/github/authenticating-to-github/creating-a-personal-access-token"
             target="_blank">
            No Token? Click here to learn how to make token
          </a>
        </div>
        <div class="col-sm-12">
          <form @submit.prevent>
            <div class="form-group">
              <label for="token">Token</label>
              <input type="text" class="form-control" id="token" v-model="token">
            </div>
            <button type="button" class="btn btn-primary" @click="saveToken" :disabled="token === ''">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <div class="card mt-2" v-if="hasToken">
      <div class="card-body">
        <div class="col-sm-12">
          Token: {{ user.github_token }}
        </div>
        <div class="col-sm-12 mb-2">
          <button type="button" class="btn btn-info" @click="getStarredRepos">
          <span v-if="!loading">
            Get Starred Repos
          </span>
            <span v-else>
            <span>
              Getting your data
            </span>
          </span>
          </button>
        </div>
        <div class="col-sm-12">
          <ul class="" v-if="repos.length > 0">
            <li v-for="repo in repos">
              <a :href="repo.url" target="_blank">{{ repo.name }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      userProp: {
        type: Object,
        required: true,
      },
    },
    data () {
      return {
        token: '',
        user: { ...this.userProp },
        repos: [],
        loading: false,
      }
    },

    computed: {
      hasToken: function () {
        return this.user && this.user.github_token && this.user.github_token !== ''
      },
    },

    methods: {
      saveToken: async function () {
        try {
          const response = await axios.put('github-token', {
            token: this.token,
          })

          this.user = response.data.data
        } catch (e) {
          console.error(e)
        }
      },

      getStarredRepos: async function () {
        this.loading = true
        try {
          const response = await axios.get('starred-repos')
          this.repos = response.data.data
        } catch (e) {
          console.error(e)
        } finally {
          this.loading = false
        }
      },
    },
  }
</script>

<style scoped>

</style>