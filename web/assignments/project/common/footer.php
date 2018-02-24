        <p onmouseover="mouseOver(this)" onmouseout="off1(this)" onmousedown="mousedown(this)" onmouseup="mouseup(this)">&copy; Plumbing Co. All Rights Reserved<br>
        This is a school project for CS 313</p>
        
        <script type="text/javascript">
        function mouseOver(obj) {
		    obj.style.backgroundColor = '#b30000';
		    obj.style.fontSize = '14px';
		    obj.style.color = '#ffffff';
		    obj.style.padding = '10px';
		}

		function off1(obj) {
		   	obj.style.fontSize = '12px';
		   	obj.style.backgroundColor = '#ffffff'; 
		   	obj.style.color = 'black';
		   	obj.style.padding = '0px';		   
		}	

		function mousedown(obj) {
	    	obj.style.backgroundColor = 'yellow';
	    	obj.style.color = 'black';
		}
		
		function mouseup(obj) {
		    obj.style.backgroundColor = 'none';
		}	
        </script>