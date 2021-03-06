export const state = () => ({
  isVisible: false,
  isVisibleEditModal: false,
  isVisibleEducationModal: false,
  isVisibleEditEducationModal: false,
  isVisibleExperienceModal: false,
  isVisibleEditExperienceModal: false,
  isVisibleSkillModal: false,
  isVisibleEditSkillModal: false
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
  },
  getExperienceModalState(state) {
    return state.isVisibleExperienceModal;
  },
  getEditExperienceModalState(state) {
    return state.isVisibleEditExperienceModal;
  },
  getSkillModalState(state) {
    return state.isVisibleSkillModal;
  },
  getEditSkillModalState(state) {
    return state.isVisibleEditSkillModal;
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
  },
  SET_EXPERIENCE_VISIBILITY(state, payload) {
    state.isVisibleExperienceModal = payload;
  },
  SET_EDIT_EXPERIENCE_VISIBILITY(state, payload) {
    state.isVisibleEditExperienceModal = payload;
  },
  SET_SKILL_VISIBILITY(state, payload) {
    state.isVisibleSkillModal = payload;
  },
  SET_EDIT_SKILL_VISIBILITY(state, payload) {
    state.isVisibleEditSkillModal = payload;
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
  },
  setExperienceVisibility({ commit }, payload) {
    commit("SET_EXPERIENCE_VISIBILITY", payload);
  },
  setEditExperienceVisibility({ commit }, payload) {
    commit("SET_EDIT_EXPERIENCE_VISIBILITY", payload);
  },
  setSkillVisibility({ commit }, payload) {
    commit("SET_SKILL_VISIBILITY", payload);
  },
  setEditSkillVisibility({ commit }, payload) {
    commit("SET_EDIT_SKILL_VISIBILITY", payload);
  }
};
