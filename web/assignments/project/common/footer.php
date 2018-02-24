        <p onmouseover="mouseOver(this)" onmouseout="off1(this)" onmousedown="mousedown(this)" onmouseup="mouseup(this)">&copy; Plumbing Co. All Rights Reserved</p>
        <p onmouseover="mouseOver(this)" onmouseout="off1(this)" onmousedown="mousedown(this)" onmouseup="mouseup(this)">This is a school project for CS 313</p>
        
        <script type="text/javascript">
        function mouseOver(obj) {
		    obj.style.backgroundColor = '#b30000';
		    obj.style.fontSize = '26px';
		}

		function off1(obj) {
		   	obj.style.fontSize = '14px'; 
		}	

		function mousedown(obj) {
	    	obj.style.backgroundColor = 'yellow';
		}
		
		function mouseup(obj) {
		    obj.style.backgroundColor = 'none';
		}	
        </script>