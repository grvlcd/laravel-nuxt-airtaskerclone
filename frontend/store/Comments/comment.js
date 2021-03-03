export const state = () => ({
  comments: []
});

export const getters = {
  getComments: state => {
    return state.comments;
  }
};

export const mutations = {
  SET_COMMENTS(state, comments) {
    state.comments = comments;
  },
  ADD_COMMENT(state, comment) {
    state.comments.push(comment);
  },
  DELETE_COMMENT(state, comment_id) {
    state.comments = state.comments.filter(
      comment => comment.id !== comment_id
    );
  }
};

export const actions = {
  setComments({ commit }, comments) {
    commit("SET_COMMENTS", comments);
  },
  addComment({ commit }, comment) {
    commit("ADD_COMMENT", comment);
  },
  deleteComment({ commit }, comment_id) {
    commit("DELETE_COMMENT", comment_id);
  }
};
