let DATA = null;
const form = document.querySelector('form');
const newsContainer = document.querySelector('#news-container');

async function getData() {
    try {
        const response = await fetch(
            'https://api-berita-indonesia.vercel.app/suara/health/');
        DATA = await response.json();

        console.log('DATA API nya', DATA);
        if (newsContainer === null) {
            console.error('Artikel tidak dapat ditampilkan');
            return;
        }

        const DATAArray = Array.from(DATA.data.posts);

        for (let i = 0; i < 4; i++) {
            const article = DATAArray[i];
            newsContainer.innerHTML += templateNews(article);
        }
    } catch (error) {
        console.error(error);
    }
}

function templateNews(data) {
    let image = '';
    if (data.thumbnail !== null) {
        image = `<img src="${data.thumbnail}" alt="">`;
    }

    return `
    <div class="col-12 col-md-6 col-lg-3 mt-4" id="news-item">
        <div class="card">
            ${image}
            <a href="${data.link}" class="mt-5">
                <h6>${data.title}</h6>
            </a>
            <p class="article-categories">${data.description}</p>
            <p class="article-time">${data.pubDate}</p>
        </div>
    </div>
    `;
}

getData();
