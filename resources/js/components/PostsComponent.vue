<template>
  <div>
    <h2 class="my-3">Posts List:</h2>
    <ul>
      <li v-for="post in posts" :key="post.id">
        <h4>
          <a href="#">
            {{ post.title }}
          </a>
        </h4>
      </li>
    </ul>
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
