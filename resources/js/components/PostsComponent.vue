<template>
  <div>
    <h2 class="my-3">Posts List:</h2>

    <div v-if="loading">... LOADING ALL CONTENTS, PLEASE WAIT...</div>

    <div v-else-if="errorMessage.length > 0">
      {{ errorMessage }}
    </div>

    <div v-else-if="posts.length > 0">
      <ul>
        <li v-for="post in posts" :key="post.id">
          <h4 @click="showPost(post.id)">
            {{ post.title }}
          </h4>
        </li>
      </ul>
    </div>

    <div v-else>No Posts to be displayed!</div>
  </div>
</template>

<script>
export default {
  name: "PostsComponent",
  data() {
    return {
      posts: [],
      errorMessage: "",
      loading: true,
    };
  },

  mounted() {
    console.log("test PostComponent");

    axios.get("/api/posts").then(({ data }) => {
      console.log("response is: ", data);
      if (data.success) {
        this.posts = data.results;
      } else {
        this.errorMessage = data.error;
      }
      this.loading = false;
    });
  },

  methods: {
    showPost(id) {
      console.log(id);

      this.loading = true;

      axios
        .get("/api/posts/" + id)
        .then((response) => {
          console.log(response);
          this.loading = false;
        })
        .catch((e) => {
          console.log("errore", e);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
h4 {
  cursor: pointer;

  &:hover {
    color: rgb(25, 72, 88);
    text-decoration: underline;
  }
}
</style>
