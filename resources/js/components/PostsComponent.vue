<template>
  <div>
    <div v-for="post in posts" :key="post.id">
      <h2>{{ post.title }}</h2>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostsComponent",
  data() {
    return {
      posts: [],
      errorMessage: "",
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
    });
  },
};
</script>

<style lang="scss" scoped>
</style>
