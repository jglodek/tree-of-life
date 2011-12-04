/**	
*		This is tree creation javascript file
*		It is copied from Chrome experiments in good will
*		We are gone to contact copyright owner of Plasma Tree script from Chrome Experiments 
*/

var user_needs = [
					{ "id" : "1", "type":"leaf"},
					{ "id" : "2", "type":"leaf"},
					{ "id" : "3", "type":"leaf"},
					{ "id" : "4", "type":"leaf"},
					{ "id" : "5", "type":"leaf-finished"},
					{ "id" : "6", "type":"leaf"},
					{ "id" : "7", "type":"leaf-finished"},
					{ "id" : "8", "type":"leaf-finished"},
					{ "id" : "1", "type":"leaf"},
					{ "id" : "2", "type":"leaf"},
					{ "id" : "3", "type":"leaf"},
					{ "id" : "4", "type":"leaf"},
					{ "id" : "1", "type":"leaf"},
					{ "id" : "2", "type":"leaf"},
					{ "id" : "3", "type":"leaf"},
					{ "id" : "4", "type":"leaf"},
					{ "id" : "5", "type":"leaf-finished"},
					{ "id" : "6", "type":"leaf"},
					{ "id" : "7", "type":"leaf-finished"},
					{ "id" : "8", "type":"leaf-finished"},
					{ "id" : "1", "type":"leaf"},
					{ "id" : "2", "type":"leaf"},
					{ "id" : "3", "type":"leaf"},
					{ "id" : "4", "type":"leaf"},					{ "id" : "1", "type":"leaf"},
					{ "id" : "2", "type":"leaf"},
					{ "id" : "3", "type":"leaf"},
					{ "id" : "4", "type":"leaf"},
					{ "id" : "5", "type":"leaf-finished"},
					{ "id" : "6", "type":"leaf"},
					{ "id" : "7", "type":"leaf-finished"},
					{ "id" : "8", "type":"leaf-finished"},
					{ "id" : "1", "type":"leaf"},
					{ "id" : "2", "type":"leaf"},
					{ "id" : "3", "type":"leaf"},
					{ "id" : "4", "type":"leaf"},
					{ "id" : "1", "type":"leaf"},
					{ "id" : "2", "type":"leaf"},
					{ "id" : "3", "type":"leaf"},
					{ "id" : "4", "type":"leaf"},
					{ "id" : "5", "type":"leaf-finished"},
					{ "id" : "6", "type":"leaf"},
					{ "id" : "7", "type":"leaf-finished"},
					{ "id" : "8", "type":"leaf-finished"},
					{ "id" : "1", "type":"leaf"},
					{ "id" : "2", "type":"leaf"},
					{ "id" : "3", "type":"leaf"},
					{ "id" : "4", "type":"leaf"}
				];
				
var user_helps = [
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"},
					{ "id" : "0", "type":"pomoc1"}
				];

(function ($) {

		var Vector = function (x, y) {
				this.x = x || 0;
				this.y = y || 0;
		};

		Vector.prototype = {
				add: function (v) {
						this.x += v.x;
						this.y += v.y;
						return this;
				},
				length: function () {
						return Math.sqrt(this.x * this.x + this.y * this.y);
				},
				rotate: function (theta) {
						var x = this.x;
						var y = this.y;
						this.x = Math.cos(theta) * this.x - Math.sin(theta) * this.y;
						this.y = Math.sin(theta) * this.x + Math.cos(theta) * this.y;
						//this.x = Math.cos(theta) * x - Math.sin(theta) * y;
						//this.y = Math.sin(theta) * x + Math.cos(theta) * y;
						return this;
				},
				mult: function (f) {
						this.x *= f;
						this.y *= f;
						return this;
				}
		};

		var Leaf = function (p, r, ctx, x, y, node) {
			this.p = p || null;
			this.r = r || 0;
			this.c = 'rgba(77,134,33,0.5)';
			this.ctx = ctx;
			this.x = x;
			this.y = y;
			this.node = node;
			this.id = this.node.id;
			this.create_div();
		}

		Leaf.prototype = {
			create_div: function()
			{
				var area = $(document.createElement('div'));
				area.css("position","absolute");
				area.css("left", this.x-5);
				area.css("top", this.y-5);
				area.css("width", 10);
				area.css("height", 10);
				var id = this.id;	
				area.mouseover(	function(){
					console.log("myszka nad " + id );	
				});
				area.click( function()
				{
					$("#canvasoverlay"),append(description_div);
					console.log("klikniecie nad " + id );
				});
				console.log("dodano " + id);

				$("#canvasoverlay").append(area);
						
			},
			render: function () {
					var that = this;
					var ctx = this.ctx;
					var f = Branch.random(1, 2)
					for (var i = 0; i < 5; i++) {
							(function (r) {
									setTimeout(function () {
											ctx.beginPath();
											ctx.fillStyle = that.c;
											ctx.moveTo(that.p.x, that.p.y);
											ctx.arc(that.p.x, that.p.y, that.r, 0, Branch.circle, true);
											ctx.fill();
									}, r * 60);
							})(i);
					}
			}
	}


		var Branch = function (p, v, r, c, t,nodes) {
				
				this.p = p || null;
				this.v = v || null;
				this.r = r || 0;
				this.nodes = nodes || null;
				this.length = 0;
				this.generation = 1;
				this.tree = t || null;
				this.color = c || 'rgba(255,255,255,1.0)';
				if(nodes.length>0)this.register();
		};

		Branch.prototype = {
				register: function () {
						this.tree.addBranch(this);
				},
				draw: function () {
						var ctx = this.tree.ctx;
						ctx.beginPath();
						ctx.fillStyle = this.color;
						ctx.moveTo(this.p.x, this.p.y);
						ctx.arc(this.p.x, this.p.y, Math.max(this.r,1), 0, Branch.circle, true);
						ctx.fill();
				},
				modify: function () 
				{
						var angle = 0.18 - (0.10 / this.generation);
						this.p.add(this.v);
						this.length += this.v.length();
						this.r *= 0.99;
						this.v.rotate(Branch.random(-angle, angle)); //.mult(0.996);
						
				},
				grow: function () {
						this.draw();
						this.modify();
						this.fork();
				},
				fork: function () {
						///DECYZJA KIEDY MAMY ZROBIC ROZWIDLENIE <- Do poprawy!
						var p = this.length - Math.max(Branch.random(this.r*20,this.r*35 ), 100); // + (this.generation * 10);
						if (p > 0) {							
							this.tree.stat.fork += 1;
							if(this.nodes.length == 1)
							{
								///DODAJEMY LIŚĆ LUB KWIATEK Bo koniec galzei
								this.tree.removeBranch(this);
								var l = new Leaf(this.p, 5, this.tree.ctx,this.p.x,this.p.y, this.nodes[0]);
								l.render();
								return this;
							}
							else
							{
									///Rozdzielamy na dwa lub wiecej
									var middle = this.nodes.length/3;
									var arr1 = this.nodes.slice(0,middle);
									var arr2 = this.nodes.slice(middle+1);

									///JEDNA TRZECIA
									var r = new Branch(new Vector(this.p.x, this.p.y), new Vector(this.v.x, this.v.y),this.r, this.color, this.tree, arr1);
									r.generation = this.generation + 1;

									///DWIE TRZECIE
									var r = new Branch(new Vector(this.p.x, this.p.y), new Vector(this.v.x, this.v.y),this.r, this.color, this.tree, arr2);
									r.generation = this.generation + 1;
											
									this.tree.removeBranch(this);
									console.log("dziele na dwa");
								}
						}
				}
		};

		Branch.circle = 2 * Math.PI;
		Branch.random = function (min, max) {
				return Math.random() * (max - min) + min;
		};
		Branch.clone = function (b) {
				var r = new Branch(new Vector(b.p.x, b.p.y), new Vector(b.v.x, b.v.y), b.r, b.color, b.tree, b.nodes);
				r.generation = b.generation + 1;
				return r;
		};
		Branch.rgba = function (r, g, b, a) {
				return 'rgba(' + r + ',' + g + ',' + b + ',' + a + ')';
		};
		Branch.randomrgba = function (min, max, a) {
				return Branch.rgba(Math.round(Branch.random(min, max)), Math.round(Branch.random(min, max)), Math.round(Branch.random(min, max)), a);
		};

		var Tree = function () {
				var branches = [];
				var timer;
				this.stat = {
						fork: 0,
						length: 0
				};
				this.addBranch = function (b) {
						branches.push(b);
				};
				this.removeBranch = function (b) {
						for (var i = 0; i < branches.length; i++) {
								if (branches[i] === b) {
										branches.splice(i, 1);
										return;
								}
						}
				};
				this.render = function (fn) {
						var that = this;
						timer = setInterval(function () {
								fn.apply(that, arguments);
								if (branches.length > 0) {
										for (var i = 0; i < branches.length; i++) {
												branches[i].grow();
										}
								}
								else {
										//clearInterval(timer);
								}
						}, 1000 / 30);
				};
				this.init = function (ctx) {
						this.ctx = ctx;
				};
				this.abort = function () {
						branches = [];
						this.stat = {
								fork: 0,
								length: 0
						}
				};
		};


		function init() {

				// init

				var $window = $(window);
				var $body = $("body");    
				var canvas_width = $window.width();
				var canvas_height = $window.height() - 30;
				var center_x = canvas_width / 2;
				var stretch_factor = 600 / canvas_height;
				var y_speed = 3 / stretch_factor;
				var $statMsg = $("#statMsg");

				// tx

				var canvas = $('#canvas')[0];
				canvas.width = canvas_width;
				canvas.height = canvas_height;
				var ctx = canvas.getContext("2d");
				ctx.globalCompositeOperation = "darker";

				// tree

				var t = new Tree();
				t.init(ctx);
				
				///TODO: Pobranie danych ajaxem
				///TODO: Podzielenie danych na kategorie
				///ILE LISCI NA GALAZ
				var ile_lisci_na_galaz = 20;
				///POTRZEBY
				{
					for(var i = 0;i<user_needs.length-1;++i)
					{
						
						var krotnosc = 0;
						///iteracja po wszystkich
						if(i%(ile_lisci_na_galaz) == ile_lisci_na_galaz-1)
						{
							var array = user_needs.slice(krotnosc*ile_lisci_na_galaz, i);
							new Branch(new Vector(center_x, canvas_height), new Vector(Math.random(-1, 1), -y_speed), 15 / stretch_factor, Branch.rgba(58, 201, 22, 0.3), t, array);
							krotnosc++;
							console.log("dodaje brancz potrzeba");
						}
					}
					var array = user_needs.slice(krotnosc*ile_lisci_na_galaz);
					///Koncowka
					new Branch(new Vector(center_x, canvas_height), new Vector(Math.random(-1, 1), -y_speed), 15 / stretch_factor, Branch.rgba(58, 201, 22, 0.3), t, array);
				}	
				///POMOC
				{
					var krotnosc = 0;
					for(var i = 0;i<user_helps.length-1;++i)
					{
						///iteracja po wszystkich
						if(i%10 == 9)
						{
							var array = user_helps.slice(krotnosc*ile_lisci_na_galaz, i);
							new Branch(new Vector(center_x, canvas_height), new Vector(Math.random(-1, 1), -y_speed), 15 / stretch_factor, Branch.rgba(122, 27, 163, 0.3), t, array);
							krotnosc++;
							console.log("dodaje brancz pomoc");
						}
					}
					var array = user_helps.slice(krotnosc*ile_lisci_na_galaz);
					///Koncowka
					new Branch(new Vector(center_x, canvas_height), new Vector(Math.random(-1, 1), -y_speed), 15 / stretch_factor, Branch.rgba(67, 124, 23, 0.3), t, array);
				}	
				
				
				
				t.render(function () {
						$statMsg.html(this.stat.fork);
				});

				// events
				
/**
				$("#drawArea").click(function (e) {
						//e.preventDefault();
						var x, y;
						x = e.pageX - this.offsetLeft;
						y = e.pageY - this.offsetTop;
						new Branch(new Vector(x, canvas_height), new Vector(0, -y_speed), 15 / stretch_factor, Branch.randomrgba(0, 255, 0.3), t);
				});
			*/
			
				$("#btnClear").click(function (e) {
						e.stopPropagation();
						t.abort();
						ctx.clearRect(0, 0, canvas_width, canvas_height);
						$statMsg.html("0");
				});
				$("#btnReload").click(function (e) {
						e.stopPropagation();
						window.location.reload();
				});
				$("#btnNewExperiment").click(function (e) {
						window.location = "http://www.openrise.com/lab/FlowerPower";
				});
		}


		$(function () {
				init();
		});


})(jQuery);
