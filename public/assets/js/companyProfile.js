document.querySelector('#overview').addEventListener('click', () => {
    document.querySelector('.footer-disclaimer').style.display = 'block';
    document.querySelector('.comp-comment').style.display = 'none';

    document.querySelector('#overview').classList.add('active');
    document.querySelector('#review').classList.remove('active');
});

document.querySelector('#review').addEventListener('click', () => {
    document.querySelector('.footer-disclaimer').style.display = 'none';
    document.querySelector('.comp-comment').style.display = 'block';

    document.querySelector('#review').classList.add('active');
    document.querySelector('#overview').classList.remove('active');
});

document.querySelector('#write-review').addEventListener('click', () => {
    document.querySelector('#review').scrollIntoView({
        behavior: 'smooth'
    });
    document.querySelector('.footer-disclaimer').style.display = 'none';
    document.querySelector('.comp-comment').style.display = 'block';

    document.querySelector('#review').classList.add('active');
    document.querySelector('#overview').classList.remove('active');
});

document.querySelector('#see-more').addEventListener('click', () => {
    document.querySelector('#review').scrollIntoView({
        behavior: 'smooth'
    });
    document.querySelector('.footer-disclaimer').style.display = 'none';
    document.querySelector('.comp-comment').style.display = 'block';

    document.querySelector('#review').classList.add('active');
    document.querySelector('#overview').classList.remove('active');
});

document.querySelector("#submit-cmt").addEventListener("click", (e) => {
    console.log(e.target);
    const company_id = e.target.getAttribute("data-company-id"); 
    const content = document.querySelector('#comment-content').value ;
    const rating = document.querySelector("input[name='rating']:checked") 
        ? document.querySelector("input[name='rating']:checked").value 
        : 0;
    if (!content.trim()) {
        alert("Please enter a comment before submitting!"); 
        return;
    }
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/api/addComment", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
    xhr.setRequestHeader("Content-Type", "application/json"); 
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                const response = JSON.parse(xhr.responseText);
                const newComment = response.comment;
                addCommentToUI(newComment);
                document.querySelector('#comment-content').value = "";
                document.querySelectorAll("input[name='rating']").forEach(radio => {
                    radio.checked = false;
                });
            } else {
                if (xhr.status == 401) {
                    alert("You need to login first!");  
                } else {
                    alert("An error occurred. Please try again." + xhr.status);
                }
            }
        }
    };
    xhr.send(JSON.stringify({ company_id, content, rating}));
});


function addCommentToUI(comment) {
    const commentList = document.querySelector('.comp-cmt'); // Lấy danh sách bình luận
    const newCommentElement = document.createElement('div');
    newCommentElement.classList.add('review-card');

    let starHtml = "";
    for (let i = 1; i <= 5; i++) {
        if (i <= comment.rating) {
            starHtml += `<i class="bi bi-star-fill"></i> `; // Sao đầy
        } else {
            starHtml += `<i style="color: gray" class="bi bi-star"></i> `; // Sao rỗng
        }
    }

    let userImage = comment.user_image;
    if (!userImage.startsWith('http://') && !userImage.startsWith('https://')) {
        userImage = asset('assets/images/avatars/' + userImage); 
    }

    newCommentElement.innerHTML = `
        <div class="review-header">
            <img src="${userImage}" alt="Ảnh User" class="user-avatar">
            <div>
                <p class="user-name"><b>${comment.user_name}</b></p>
                <p class="review-date">${comment.created_at}</p>
                ${starHtml} 
            </div>
        </div>
        <div class="review-content">
            <p>${comment.comment_content}</p>
        </div>
    `;

    commentList.prepend(newCommentElement);
}
