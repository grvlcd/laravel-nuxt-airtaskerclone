export default ({ app, route, redirect }) => {
  if (app.$auth.user.id === route.params.slug) {
    return redirect("/profile");
  }
};
