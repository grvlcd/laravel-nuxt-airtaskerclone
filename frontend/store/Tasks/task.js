export const state = () => ({
  tasks: [],
  task: {},
  isVisible: false
});

export const getters = {
  getTasks: state => {
    return state.tasks;
  },
  getTask: state => {
    return state.task;
  },
  getVisibility: state => {
    return state.isVisible;
  }
};

export const mutations = {
  SET_TASKS(state, tasks) {
    state.tasks = tasks;
  },
  SET_TASK(state, task) {
    state.task = task;
    state.isVisible = task ? true : false;
  },
  ADD_TASK(state, task) {
    state.tasks.unshift(task);
  },
  DELETE_TASK(state, task_id) {
    state.tasks = state.tasks.filter(task => task.id !== task_id);
  },
  UPDATE_TASK(state, task) {
    const index = state.tasks.findIndex(item => item.id === task.id);
    if (index !== -1) {
      state.tasks.splice(index, 1, task);
    }
  }
};

export const actions = {
  setTasks({ commit }, tasks) {
    commit("SET_TASKS", tasks);
  },
  setTask({ commit }, task) {
    commit("SET_TASK", task);
  },
  addTask({ commit }, task) {
    commit("ADD_TASK", task);
  },
  deleteTask({ commit }, task_id) {
    commit("DELETE_TASK", task_id);
  },
  updateTask({ commit }, task) {
    commit("UPDATE_TASK", task);
  }
};
