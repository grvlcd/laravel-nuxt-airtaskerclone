export const state = () => ({
  skills: [],
  experiences: [],
  educations: []
});

export const getters = {
  getSkills: state => {
    return state.skills;
  },
  getExperiences: state => {
    return state.experiences;
  },
  getEducations: state => {
    return state.educations;
  }
};

export const mutations = {
  SET_SKILLS(state, skills) {
    state.skills = skills;
  },
  SET_EXPERIENCES(state, experiences) {
    state.experiences = experiences;
  },
  SET_EDUCATIONS(state, educations) {
    state.educations = educations;
  },
  ADD_SKILL(state, skill) {
    state.skills.push(skill);
  },
  DELETE_SKILL(state, skill_id) {
    const index = state.skills.findIndex(skill => skill.id === skill_id);
    state.skills.splice(index, 1);
  },
  ADD_EXPERIENCE(state, experience) {
    state.experiences.push(experience);
  },
  DELETE_EXPERIENCE(state, experience_id) {
    const index = state.experiences.findIndex(
      experience => experience.id === experience_id
    );
    state.experiences.splice(index, 1);
  },
  ADD_EDUCATION(state, education) {
    state.educations.push(education);
  },
  DELETE_EDUCATION(state, education_id) {
    const index = state.educations.findIndex(
      education => education.id === education_id
    );
    state.educations.splice(index, 1);
  }
};

export const actions = {
  setSkills({ commit }, skills) {
    commit("SET_SKILLS", skills);
  },
  setExperiences({ commit }, experiences) {
    commit("SET_EXPERIENCES", experiences);
  },
  setEducations({ commit }, educations) {
    commit("SET_EDUCATIONS", educations);
  },
  addSkill({ commit }, skill) {
    commit("ADD_SKILL", skill);
  },
  deleteSkill({ commit }, skill_id) {
    commit("DELETE_SKILL", skill_id);
  },
  addExperience({ commit }, experience) {
    commit("ADD_EXPERIENCE", experience);
  },
  deleteExperience({ commit }, experience_id) {
    commit("DELETE_EXPERIENCE", experience_id);
  },
  addEducation({ commit }, education) {
    commit("ADD_EDUCATION", education);
  },
  deleteEducation({ commit }, education_id) {
    commit("DELETE_EDUCATION", education_id);
  }
};
