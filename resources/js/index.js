const elements = document.querySelectorAll('.js-textLimit');

elements.forEach(e => {
  // 要素の高さを判定
  const textHeight = e.clientHeight;
  // const txt = e.textContent.length;
  if (textHeight > 300) {
    // ステータス変更
    e.classList.add('is-hide','-long');
    
    // ボタンの追加（要素を追加する）
    let newNode = document.createElement('button');
    newNode.setAttribute('type', 'button');
    const newContent = document.createTextNode('もっと見る');
    newNode.appendChild(newContent);
    e.insertBefore(newNode,null);

    // クリックの動作
    const btn = e.querySelector('button');
    btn.addEventListener('click', () => {
      const status = e.classList.contains('is-hide');
      if (status) {
        // 開く
        e.classList.remove('is-hide');
        btn.innerHTML = '閉じる';
      } else {
        // 閉じる
        e.classList.add('is-hide');
        btn.innerHTML = 'もっと見る';
      }
    });
  }
});