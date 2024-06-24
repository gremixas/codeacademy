const experiencesApi = 'https://zany-skitter-caper.glitch.me/experiences';
const skillsApi = 'https://zany-skitter-caper.glitch.me/skills';

const fetchData = async (dataApi) => {
    try {
        const response = await fetch(dataApi);
        if (response.ok) {
            return await response.json();
        }
    } catch (error) {
        console.error(error);
    }
};

function renderExperiences(experiences) {
    const experiencesSection = document.querySelector('.experience');
    const experiencesSectionH2 = document.querySelectorAll('.section-header');
    // console.log(experiencesSectionH2)
    experiencesSectionH2.forEach(h2 => h2.style.display = "block")
    let experienceCards = '';
    experiences.forEach(experience => {
        experienceCards += `
        <div class="exp-card">
            <div class="exp-left">
                <h3 class="work-year">${experience.startYear} - ${experience.finishYear}</h3>
                <h4 class="company-name">${experience.companyName}</h4>
            </div>
            <div class="exp-right">
                <h3 class="position">${experience.position}</h3>
                <p class="description">${experience.description}</p>
            </div>
        </div>
        `;
    });
    experiencesSection.innerHTML = experienceCards;
}

function renderSkills(skills) {
    const skillsSection = document.querySelector('.skills');
    skills.forEach(skill => {
        const skillName = document.createElement('span');
        skillName.className = 'skill-name';
        skillName.innerText = skill.title;
        const progressBar = document.createElement('div');
        progressBar.className = 'progress-bar';
        // progressBar.style.setProperty('--progress', skill.level);
        progressBar.setAttribute('skill-lvl', skill.level);
        skillsSection.append(skillName, progressBar);
    });
    const progressBarsArray = document.querySelectorAll('.progress-bar');
    setTimeout(() => {
        progressBarsArray.forEach((bar, index) => {
            bar.style.setProperty('--progress', skills[index].level);
            // bar.setAttribute('skill-lvl', skills[index].level);
        })
    }, 1000);
}

async function init() {
    const experiencesData = await fetchData(experiencesApi);
    const skillsData = await fetchData(skillsApi);
    renderExperiences(experiencesData);
    renderSkills(skillsData);
}

init();