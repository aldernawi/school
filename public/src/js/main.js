// Header menu functionality
document.querySelector(".links-shower i").onclick = () => {
  document.querySelector(".links-holder").style.right = "0";
};
document.querySelector(".links-holder i").onclick = () => {
  document.querySelector(".links-holder").style.right = "-110%";
};

// Update current year in footer
const currentYear = new Date().getFullYear();
const yearSpan = document.querySelector(".year");
if (yearSpan) yearSpan.textContent = currentYear;

// create task
const taskholder = document.querySelector(".create-task");
const taskBtn = document.querySelector(".create-task-btn");

if (taskholder && taskBtn) {
  const layout = document.querySelector(".layout");
  taskBtn.onclick = () => {
    taskholder.style.top = "50%";
    layout.style.top = "50%";
  };
  document.querySelector(".cancel-task").onclick = () => {
    taskholder.style.top = "-150%";
    layout.style.top = "-150%";
  };
}

// create service
const serviceholder = document.querySelector(".create-service");
const serviceBtn = document.querySelector(".create-service-btn");
if (serviceholder && serviceBtn) {
  const layout = document.querySelector(".layout");
  serviceBtn.onclick = () => {
    serviceholder.style.top = "50%";
    layout.style.top = "50%";
  };
  document.querySelector(".cancel-servic").onclick = () => {
    serviceholder.style.top = "-150%";
    layout.style.top = "-150%";
  };
}

// edit profile
const editholder = document.querySelector(".edit-header");
const editBtn = document.querySelector(".edit-btn");
if (editholder && editBtn) {
  const layout = document.querySelector(".layout");
  editBtn.onclick = () => {
    editholder.style.top = "50%";
    layout.style.top = "50%";
  };
  document.querySelector(".cancel-edit").onclick = () => {
    editholder.style.top = "-150%";
    layout.style.top = "-150%";
  };
}

// edit card
const editCardholder = document.querySelector(".edit-card");
const editCardBtn = document.querySelectorAll(".edit-card-btn");

if (editCardholder && editCardBtn) {
  const layout = document.querySelector(".layout");
  editCardBtn.forEach((btn) => {
    btn.onclick = () => {
      editCardholder.style.top = "50%";
      layout.style.top = "50%";
    };
  });
  document.querySelector(".cancel-edit-card").onclick = () => {
    editCardholder.style.top = "-150%";
    layout.style.top = "-150%";
  };
}

// delete card
const deleteHolder = document.querySelector(".delete-card");
const deleteBtn = document.querySelectorAll(".delete-btn");
if (deleteHolder && deleteBtn) {
  const layout = document.querySelector(".layout");
  deleteBtn.forEach((btn) => {
    btn.onclick = () => {
      deleteHolder.style.top = "50%";
      layout.style.top = "50%";
    };
  });
  document.querySelector(".cancel-delete-card").onclick = () => {
    deleteHolder.style.top = "-150%";
    layout.style.top = "-150%";
  };
}

// add card
const addHolder = document.querySelector(".add-card");
const addBtn = document.querySelectorAll(".add-btn");
if (addHolder && addBtn) {
  const layout = document.querySelector(".layout");
  addBtn.forEach((btn) => {
    btn.onclick = () => {
      addHolder.style.top = "50%";
      layout.style.top = "50%";
    };
  });
  document.querySelector(".cancel-add-card").onclick = () => {
    addHolder.style.top = "-150%";
    layout.style.top = "-150%";
  };
}

// status-card
const statusHolder = document.querySelector(".status-card");
const statusBtn = document.querySelectorAll(".status-btn");
if (statusHolder && statusBtn) {
  const layout = document.querySelector(".layout");
  statusBtn.forEach((btn) => {
    btn.onclick = () => {
      statusHolder.style.top = "50%";
      layout.style.top = "50%";
    };
  });
  document.querySelector(".cancel-status-card").onclick = () => {
    statusHolder.style.top = "-150%";
    layout.style.top = "-150%";
  };
}

// Create question modal functionality
const layout = document.querySelector(".layout");
const qholder = document.querySelector(".create-quesion");
const qBtn = document.querySelector(".create-new-quesion");
if (qholder && qBtn) {
  qBtn.onclick = () => {
    qholder.style.top = "50%";
    layout.style.top = "50%";
  };
  document.querySelector(".cancel-create-question").onclick = () => {
    clearQuestion();
    qholder.style.top = "-150%";
    layout.style.top = "-150%";
  };
}

// Handle question type changes
const handleQuestionType = () => {
  const questionType = document.getElementById("question-type").value;
  const answersHolder = document.querySelector(".create-quesion .answers");
  const createNewAnswerButton = document.querySelector(".create-new-answer");

  // Clear existing inputs in answersHolder
  while (answersHolder.firstChild) {
    answersHolder.removeChild(answersHolder.firstChild);
  }

  // Remove existing correct answer input or select
  const existingCorrectAnswerInput = document.querySelector(
    ".correct-answer-input"
  );
  if (existingCorrectAnswerInput) {
    existingCorrectAnswerInput.parentNode.removeChild(
      existingCorrectAnswerInput
    );
  }
  const existingCorrectAnswerSelect = document.querySelector(
    ".correct-answer-select"
  );
  if (existingCorrectAnswerSelect) {
    existingCorrectAnswerSelect.parentNode.removeChild(
      existingCorrectAnswerSelect
    );
  }

  if (questionType === "true-of-false") {
    // For true or false, add two uneditable inputs with "True" and "False"
    const trueInput = document.createElement("input");
    trueInput.setAttribute("type", "text");
    trueInput.setAttribute("value", "True");
    trueInput.classList.add("field");
    trueInput.readOnly = true;

    const falseInput = document.createElement("input");
    falseInput.setAttribute("type", "text");
    falseInput.setAttribute("value", "False");
    falseInput.classList.add("field");
    falseInput.readOnly = true;

    answersHolder.appendChild(trueInput);
    answersHolder.appendChild(falseInput);

    // Hide create new answer button
    createNewAnswerButton.style.display = "none";

    // Add correct answer select box
    const correctAnswerSelect = document.createElement("select");
    correctAnswerSelect.classList.add("correct-answer-select", "field");
    correctAnswerSelect.innerHTML = `
      <option value="" selected disabled hidden>حدد الإجابة الصحيحة</option>
      <option value="True">True</option>
      <option value="False">False</option>
    `;

    answersHolder.parentNode.insertBefore(
      correctAnswerSelect,
      answersHolder.nextSibling
    );
  } else if (questionType === "chose-the-correct") {
    // Allow user to add answers (2-4)
    createNewAnswerButton.style.display = "block";

    // Initially, create two answer inputs
    for (let i = 0; i < 2; i++) {
      const input = document.createElement("input");
      input.setAttribute("type", "text");
      input.setAttribute("placeholder", `الإجابة ${i + 1}`);
      input.classList.add("field", "answer-input");
      answersHolder.appendChild(input);
    }

    // Add correct answer select box
    const correctAnswerSelect = document.createElement("select");
    correctAnswerSelect.classList.add("correct-answer-select", "field");
    correctAnswerSelect.innerHTML = `<option value="" selected disabled hidden>حدد الإجابة الصحيحة</option>`;

    answersHolder.parentNode.insertBefore(
      correctAnswerSelect,
      answersHolder.nextSibling
    );

    // Update correct answer select options
    updateCorrectAnswerOptions();

    // Add event listener to answer inputs to update the correct answer select options
    answersHolder.addEventListener("input", updateCorrectAnswerOptions);
  } else if (questionType === "fill-in-the-blank") {
    // Hide create new answer button
    createNewAnswerButton.style.display = "none";
    // Add one input for the correct answer
    const correctAnswerInput = document.createElement("input");
    correctAnswerInput.setAttribute("type", "text");
    correctAnswerInput.setAttribute("placeholder", "الإجابة الصحيحة");
    correctAnswerInput.classList.add("field", "correct-answer-input");
    answersHolder.parentNode.insertBefore(
      correctAnswerInput,
      answersHolder.nextSibling
    );
  }
};

const updateCorrectAnswerOptions = () => {
  const questionType = document.getElementById("question-type").value;
  if (questionType !== "chose-the-correct") return;

  const correctAnswerSelect = document.querySelector(".correct-answer-select");
  if (!correctAnswerSelect) return;

  // Clear existing options
  correctAnswerSelect.innerHTML = `<option value="" selected disabled hidden>حدد الإجابة الصحيحة</option>`;

  // Get current answer inputs
  const answerInputs = document.querySelectorAll(".answers .answer-input");
  answerInputs.forEach((input, index) => {
    const value = input.value.trim();
    if (value) {
      const option = document.createElement("option");
      option.value = value;
      option.textContent = value;
      correctAnswerSelect.appendChild(option);
    }
  });
};

// Create new answer functionality
const createNewAnswer = document.querySelector(".create-new-answer");
const answersHolder = document.querySelector(".create-quesion .answers");

if (createNewAnswer) {
  createNewAnswer.onclick = () => {
    const questionType = document.getElementById("question-type").value;
    if (questionType === "chose-the-correct") {
      const answerCount =
        answersHolder.querySelectorAll(".answer-input").length;
      if (answerCount < 4) {
        const input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("placeholder", `الإجابة ${answerCount + 1}`);
        input.classList.add("field", "answer-input");
        answersHolder.appendChild(input);

        // Update correct answer options
        updateCorrectAnswerOptions();

        // If answer count reaches 4, hide the button
        if (answerCount + 1 === 4) {
          createNewAnswer.style.display = "none";
        }
      }
    }
  };
}

// Create question function
const getQuestionNumber = () => {
  return document.querySelectorAll(".questions-holder > .question").length || 0;
};

const createQuestion = () => {
  const qName = document.querySelector(".create-quesion .q-name").value.trim();
  const qMark = document.querySelector(".question-body .q-mark").value.trim();
  const qType = document.getElementById("question-type").value;

  let correctAnswer = "";

  // Get correct answer
  if (qType === "true-of-false" || qType === "chose-the-correct") {
    const correctAnswerSelect = document.querySelector(
      ".correct-answer-select"
    );
    if (correctAnswerSelect) {
      correctAnswer = correctAnswerSelect.value;
    }
  } else if (qType === "fill-in-the-blank") {
    const correctAnswerInput = document.querySelector(".correct-answer-input");
    if (correctAnswerInput) {
      correctAnswer = correctAnswerInput.value.trim();
    }
  }

  // Create question container
  const questionHolder = document.createElement("div");
  questionHolder.classList.add("question");

  // Store correct answer as data attribute
  questionHolder.dataset.correctAnswer = correctAnswer;

  // Create question mark
  const questionMark = document.createElement("span");
  questionMark.classList.add("grade");
  questionMark.innerHTML = `${qMark} درجات`;

  // Create question title
  const questionTitle = document.createElement("h2");
  questionTitle.classList.add("question-title");
  questionTitle.innerHTML = `س - ${qName}`;
  questionTitle.appendChild(questionMark);

  // Create question type
  const questionType = document.createElement("h3");
  questionType.classList.add("question-type");
  questionType.innerHTML = `النوع - ${qType}`;

  // Create question number
  const questionNumber = document.createElement("span");
  questionNumber.classList.add("question-number");
  questionNumber.innerHTML = getQuestionNumber() + 1;

  // Create question body
  const questionBody = document.createElement("div");
  questionBody.classList.add("answers");

  if (qType === "true-of-false" || qType === "chose-the-correct") {
    // For these types, show options
    const answers = [];
    if (qType === "true-of-false") {
      answers.push("True");
      answers.push("False");
    } else {
      const answerInputs = document.querySelectorAll(".answers .answer-input");
      answerInputs.forEach((input) => {
        answers.push(input.value.trim());
      });
    }

    answers.forEach((answerText, index) => {
      const answer = document.createElement("div");
      answer.classList.add("answer");

      const input = document.createElement("input");
      input.setAttribute("type", "radio");
      input.setAttribute("id", `q${getQuestionNumber() + 1}-a${index + 1}`);
      input.setAttribute("name", `q${getQuestionNumber() + 1}`);

      const label = document.createElement("label");
      label.setAttribute("for", `q${getQuestionNumber() + 1}-a${index + 1}`);
      label.textContent = answerText;

      answer.appendChild(input);
      answer.appendChild(label);
      questionBody.appendChild(answer);
    });
  } else if (qType === "fill-in-the-blank") {
    // For fill in the blank, show an input field
    const inputField = document.createElement("input");
    inputField.setAttribute("type", "text");
    inputField.setAttribute("placeholder", "إجابتك");
    inputField.classList.add("field");
    questionBody.appendChild(inputField);
  }

  // Append elements to question holder
  questionHolder.appendChild(questionTitle);
  questionHolder.appendChild(questionType);
  questionHolder.appendChild(questionNumber);
  questionHolder.appendChild(questionBody);

  // Add the question to the questions holder in the DOM
  document.querySelector(".questions-holder").appendChild(questionHolder);

  // Close the modal or form
  qholder.style.top = "-150%";
  layout.style.top = "-150%";

  // Reset the form
  document.querySelector(".create-quesion .q-name").value = "";
  document.querySelector(".question-body .q-mark").value = "";
  document.getElementById("question-type").value = "";
  // Clear answers
  while (answersHolder.firstChild) {
    answersHolder.removeChild(answersHolder.firstChild);
  }
  // Remove correct answer input/select
  const existingCorrectAnswerInput = document.querySelector(
    ".correct-answer-input"
  );
  if (existingCorrectAnswerInput) {
    existingCorrectAnswerInput.parentNode.removeChild(
      existingCorrectAnswerInput
    );
  }
  const existingCorrectAnswerSelect = document.querySelector(
    ".correct-answer-select"
  );
  if (existingCorrectAnswerSelect) {
    existingCorrectAnswerSelect.parentNode.removeChild(
      existingCorrectAnswerSelect
    );
  }

  // Update counts
  updateQuestionsCount();
  updateGradesCount();
};

// Update question and grade counts
const updateQuestionsCount = () => {
  const questionCount = getQuestionNumber();
  const questionsNumberSpan = document.querySelector(".questions-number");
  if (questionsNumberSpan) {
    questionsNumberSpan.textContent = questionCount;
  }
};

const updateGradesCount = () => {
  const questions = document.querySelectorAll(".questions-holder .question");
  let totalGrades = 0;
  questions.forEach((question) => {
    const gradeSpan = question.querySelector(".grade");
    if (gradeSpan) {
      const gradeValue = parseInt(gradeSpan.textContent);
      totalGrades += isNaN(gradeValue) ? 0 : gradeValue;
    }
  });
  const gradesNumberSpan = document.querySelector(".grades-number");
  if (gradesNumberSpan) {
    gradesNumberSpan.textContent = totalGrades;
  }
};

// Clear question form
const clearQuestion = () => {
  document.querySelector(".q-name").value = "";
  document.querySelector(".q-mark").value = "";
  document.getElementById("question-type").value = "";
  // Hide create new answer button
  document.querySelector(".create-new-answer").style.display = "none";
  // Remove answers
  while (answersHolder.firstChild) {
    answersHolder.removeChild(answersHolder.firstChild);
  }
  // Remove correct answer input/select
  const existingCorrectAnswerInput = document.querySelector(
    ".correct-answer-input"
  );
  if (existingCorrectAnswerInput) {
    existingCorrectAnswerInput.parentNode.removeChild(
      existingCorrectAnswerInput
    );
  }
  const existingCorrectAnswerSelect = document.querySelector(
    ".correct-answer-select"
  );
  if (existingCorrectAnswerSelect) {
    existingCorrectAnswerSelect.parentNode.removeChild(
      existingCorrectAnswerSelect
    );
  }
};

// Event listener for question type change
const selector = document.querySelector("#question-type");
if (selector) {
  selector.onchange = () => {
    handleQuestionType();
  };
}

// Handle create question button click
const createQuesionBtn = document.querySelector(".create-quesion-btn");
if (createQuesionBtn) {
  createQuesionBtn.onclick = () => {
    const qName = document
      .querySelector(".create-quesion .q-name")
      .value.trim();
    const qMark = document.querySelector(".question-body .q-mark").value.trim();
    const qType = document.getElementById("question-type").value;

    let valid = true;
    if (!qName || !qMark || !qType) {
      alert("يرجى ملء جميع الحقول المطلوبة.");
      valid = false;
    }

    let correctAnswer = "";
    if (qType === "true-of-false" || qType === "chose-the-correct") {
      const correctAnswerSelect = document.querySelector(
        ".correct-answer-select"
      );
      if (!correctAnswerSelect || !correctAnswerSelect.value) {
        alert("يرجى تحديد الإجابة الصحيحة.");
        valid = false;
      } else {
        correctAnswer = correctAnswerSelect.value;
      }
    } else if (qType === "fill-in-the-blank") {
      const correctAnswerInput = document.querySelector(
        ".correct-answer-input"
      );
      if (!correctAnswerInput || !correctAnswerInput.value.trim()) {
        alert("يرجى إدخال الإجابة الصحيحة.");
        valid = false;
      } else {
        correctAnswer = correctAnswerInput.value.trim();
      }
    }

    if (valid) {
      createQuestion();
      clearQuestion();
    }
  };
}

// Save quiz functionality
document.addEventListener("DOMContentLoaded", function () {
  const saveQuizButton = document.querySelector(".save-quiz");

  function validateInputs() {
    const quizName = document.querySelector(".quiz-name input").value.trim();
    const quizTime = document.querySelector(".quiz-time input").value.trim();
    const questions = document.querySelectorAll(".questions-holder .question");

    if (!quizName || !quizTime || questions.length === 0) {
      alert("يرجى ملء جميع الحقول المطلوبة وإضافة سؤال واحد على الأقل.");
      return false;
    }

    return true;
  }

  function createQuizJSON() {
    const quizName = document.querySelector(".quiz-name input").value.trim();
    const quizTime = parseInt(
      document.querySelector(".quiz-time input").value.trim()
    );
    const questions = document.querySelectorAll(".questions-holder .question");

    const quizJSON = {
      "quiz-name": quizName,
      "quiz-time": quizTime,
      questions: [],
    };

    questions.forEach((question, index) => {
      const questionText = question
        .querySelector(".question-title")
        .textContent.split(" - ")[1]
        .trim();
      const questionType = question
        .querySelector(".question-type")
        .textContent.split(" - ")[1]
        .trim();

      let answers = [];
      let correctAnswer = "";

      if (
        questionType === "true-of-false" ||
        questionType === "chose-the-correct"
      ) {
        const answerElements = question.querySelectorAll(
          ".answers .answer label"
        );
        answers = Array.from(answerElements).map((label) =>
          label.textContent.trim()
        );
        correctAnswer = question.dataset.correctAnswer || "";
      } else if (questionType === "fill-in-the-blank") {
        correctAnswer = question.dataset.correctAnswer || "";
        answers = []; // No options in fill-in-the-blank
      }

      quizJSON.questions.push({
        question: questionText,
        "question-type": questionType,
        answers: answers,
        "correct-answer": correctAnswer,
      });
    });

    return quizJSON;
  }

  saveQuizButton.addEventListener("click", function () {
    if (validateInputs()) {
      const quizJSON = createQuizJSON();
      console.log(JSON.stringify(quizJSON, null, 2));
      alert(
        "تم حفظ الاختبار بنجاح! يمكنك رؤية النتيجة في وحدة التحكم (Console)."
      );
    }
  });
});
