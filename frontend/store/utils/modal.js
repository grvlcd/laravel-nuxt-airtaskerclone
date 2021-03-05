export const state = () => ({
  isVisible: false,
  isVisibleEditModal: false,
  isVisibleEducationModal: false,
  isVisibleEditEducationModal: false
});

export const getters = {
  getModalState(state) {
    return state.isVisible;
  },
  getEditModalState(state) {
    return state.isVisibleEditModal;
  },
  getEducationModalState(state) {
    return state.isVisibleEducationModal;
  },
  getEditEducationModalState(state) {
    return state.isVisibleEditEducationModal;
  }
};

export const mutations = {
  SET_VISIBILITY(state, payload) {
    state.isVisible = payload;
  },
  SET_EDIT_VISIBILITY(state, payload) {
    state.isVisibleEditModal = payload;
  },
  SET_EDUCATION_VISIBILITY(state, payload) {
    state.isVisibleEducationModal = payload;
  },
  SET_EDIT_EDUCATION_VISIBILITY(state, payload) {
    state.isVisibleEditEducationModal = payload;
  }
};

export const actions = {
  setVisibility({ commit }, payload) {
    commit("SET_VISIBILITY", payload);
  },
  setEditVisibility({ commit }, payload) {
    commit("SET_EDIT_VISIBILITY", payload);
  },
  setEducationVisibility({ commit }, payload) {
    commit("SET_EDUCATION_VISIBILITY", payload);
  },
  setEditEducationVisibility({ commit }, payload) {
    commit("SET_EDIT_EDUCATION_VISIBILITY", payload);
  }
};
