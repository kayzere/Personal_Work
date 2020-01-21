 document.addEventListener('DOMContentLoaded',function(){

    const list = document.querySelector('#team-list ul');
    // Delete team
   list.addEventListener('click',function(e){
      if(e.target.className == 'Delete'){
          const li = e.target.parentElement;
          list.removeChild(li);
      }
   })
  
   // Add team
   const addForm = document.forms['add-team'];
   addForm.addEventListener('submit',function(e){
       e.preventDefault();
       const value = addForm.querySelector('input[type="text"]').value;
       // creat elements 
       const li = document.createElement('li');
       const teamName = document.createElement('span');
       const deleteBtn = document.createElement('span');
      
       // add content
       deleteBtn.textContent = 'Delete';
       teamName.textContent = value;
       
       // add classes
      teamName.classList.add('name');
      deleteBtn.classList.add('Delete');
  
       // append to document
       li.appendChild(teamName);
       li.appendChild(deleteBtn);
       list.appendChild(li);
  
   })
  
   // hide teams 
   const hideBox =document.querySelector("#hide")
   hideBox.addEventListener('change',function(e){
       if(hideBox.checked){
           list.style.display = "none";
       } else {
           list.style.display = "initial";
       }
   })
  
  // filter teams 
  const searchBar = document.forms['search-teams'].querySelector('input');
  searchBar.addEventListener('keyup',function(e){
      const term = e.target.value.toLowerCase();
      const teams  = list.getElementsByTagName('li');
      Array.from(teams).forEach(function(team){
          const title = team.firstElementChild.textContent;
          if(title.toLowerCase().indexOf(term) != -1){
              team.style.display = "block";
          } else {
              team.style.display = "none";
          }
      })
  })
  
  // tabbed content 
  const tabs = document.querySelector('.tabs');
  const panels = document.querySelectorAll('.panel');
  
  tabs.addEventListener('click',function(e){
      if(e.target.tagName == "LI"){
          const targetPanel = document.querySelector(e.target.dataset.target);
          panels.forEach(function(panel){
              if (panel == targetPanel){
                  panel.classList.add('active');
              } else {
                  panel.classList.remove('active');
              }
          })
      }
  })
 });
