// Modify createQuestion function to update counts after creating a new question
const createQuestion = () => {
  const qName = document.querySelector(".create-question .q-name").value;
  const qMark = document.querySelector(".create-question .q-mark").value;
  const questionType = document.getElementById("question-type").value;
  const answers = document.querySelectorAll("#answers .field");

  if (qName && qMark && answers.length) {
    const questionHolder = document.createElement("div");
    questionHolder.classList.add("question");

    const questionTitle = document.createElement("h2");
    questionTitle.textContent = qName;
    questionHolder.appendChild(questionTitle);

    const gradeSpan = document.createElement("span");
    gradeSpan.classList.add("grade");
    gradeSpan.textContent = `${qMark} marks`;
    questionTitle.appendChild(gradeSpan);

    const answersDiv = document.createElement("div");
    answersDiv.classList.add("answers");

    answers.forEach((answer, index) => {
      const answerLabel = document.createElement("label");
      answerLabel.textContent = answer.value;
      const answerInput = document.createElement("input");
      answerInput.setAttribute(
        "type",
        questionType === "fill-in-the-blank" ? "text" : "radio"
      );
      answersDiv.appendChild(answerLabel);
      answersDiv.appendChild(answerInput);
    });

    questionHolder.appendChild(answersDiv);
    document.querySelector(".questions-holder").appendChild(questionHolder);

    clearQuestion();
    document.querySelector(".create-question").style.display = "none";
    document.querySelector(".layout").style.display = "none";
  }
};
// answers handler
const setAnswerFields = () => {
  const questionType = document.getElementById("question-type").value;
  const answersDiv = document.getElementById("answers");
  answersDiv.innerHTML = "";

  let answerCount = 0;

  switch (questionType) {
    case "true-of-false":
      answerCount = 2;
      break;
    case "chose-the-correct":
      answerCount = 4;
      break;
    case "fill-in-the-blank":
      answerCount = 1;
      break;
    default:
      answerCount = 0;
      break;
  }

  for (let i = 1; i <= answerCount; i++) {
    const input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("placeholder", `الاجابة ${i}`);
    input.classList.add("field");
    answersDiv.appendChild(input);
  }

  const createNewAnswerBtn = document.querySelector(".create-new-answer");
  createNewAnswerBtn.style.display =
    questionType === "chose-the-correct" && answerCount === 4
      ? "none"
      : "block";
};
