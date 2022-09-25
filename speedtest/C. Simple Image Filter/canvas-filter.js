class CanvasFilter {
	constructor(dom){
		this.ctx = dom.getContext('2d');
		this.image = new Image();
		
		var self = this;
		this.image.onload=function(){
			self.renderImage()
		}
		this.filter = '';
	}
	setImage(url){
		this.image.src = url;
		this.render();
	}
	setFilter(filter){
		this.filter = filter;
		this.render();
		this.renderImage();
	}
	render(){
		this.ctx.fillStyle = "#42c78b";
		this.ctx.fillRect(0, 0, 460, 320);
	}
	renderImage(){
		this.ctx.drawImage(this.image, 10, 10, 210, 300);
		
		if(this.filter){
			this.ctx.drawImage(this.image, 240, 10, 210, 300);

			switch(this.filter){
				case 'darker':
					this.ctx.fillStyle = "rgba(0, 0, 0, 0.6)";
					break;

				case 'lighter':
					this.ctx.fillStyle="rgba(255, 255, 255, 0.6)";
					break;
			}
			this.ctx.fillRect(240, 10, 210, 300);
		}
	}
}