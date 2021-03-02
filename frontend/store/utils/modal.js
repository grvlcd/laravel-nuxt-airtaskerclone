export const state = () => ({
  isVisible: false,
  isVisibleEditModal: false
});

export const getters = {
  getModalState(state) {
    return state.isVisible;
  },
  getEditModalState(state) {
    return state.isVisibleEditModal;
  }
};

export const mutations = {
  SET_VISIBILITY(state, payload) {
    state.isVisible = payload;
  },
  SET_EDIT_VISIBILITY(state, payload) {
    state.isVisibleEditModal = payload;
  }
};

export const actions = {
  setVisibility({ commit }, payload) {
    commit("SET_VISIBILITY", payload);
  },
  setEditVisibility({ commit }, payload) {
    commit("SET_EDIT_VISIBILITY", payload);
  }
};
