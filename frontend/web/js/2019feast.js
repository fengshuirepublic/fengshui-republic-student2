'use strict';

const containerkl = document.querySelector('#form-kl-react');

class Appkl extends React.Component {

	constructor(props) {
		super(props);

		this.state = {
			quantity : 1
		}

		this.quantity = this.quantity.bind(this);
	}

	quantity(e) {

		this.setState({
			quantity : e.target.value
		});
	}

	render() {
		let person = [];
		for (let i = 0; i < this.state.quantity; ++i) {
			person.push(<Personkl key={i} id={i} />);
		}
		return (
			<div>
				<div class="row">
					<div class="col-12 col-md-6 mx-auto">
						<div class="form-group">
							<label for="order_kl_quantity">*人數</label>
							<select id="order_kl_quantity" name="Order[quantity]" class="form-control form-control-sm" required onChange={this.quantity} value={this.state.quantity}>
								<option value="1">1 位</option>
								<option value="2">2 位</option>
								<option value="3">3 位</option>
								<option value="4">4 位</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					{person}
				</div>
			</div>
		);
	}
}

class Personkl extends React.Component {

	constructor(props) {
		super(props);

		this.state = {
			name  : '',
			email : '',
			phone : ''
		}
	}

	render() {
		const id    = this.props.id + 1;
		const style = {
			backgroundColor : '#eee'
		};
		return (
			<div class="col-12 col-md-6 mx-auto mb-3">
				<div class="card">
					<div class="card-body" style={style}>
						<div class="form-group">
							<label for={'order_kl_name_' + id}>*名字 {id}</label>
							<input id={'order_kl_name_' + id} class="form-control form-control-sm" type="text" name={'Order[person][' + id + '][name]'} onChange={e => this.setState({ name : e.target.value })} value={this.state.name} required />
						</div>
						<div class="form-group">
							<label for={'order_kl_email_' + id}>*電郵 {id}</label>
							<input id={'order_kl_email_' + id} class="form-control form-control-sm" type="email" name={'Order[person][' + id + '][email]'} onChange={e => this.setState({ email : e.target.value })} value={this.state.email} required />
						</div>
						<div class="form-group">
							<label for={'order_kl_phone_' + id}>*電話 {id}</label>
							<input id={'order_kl_phone_' + id} class="form-control form-control-sm" type="text" name={'Order[person][' + id + '][phone]'} onChange={e => this.setState({ phone : e.target.value })} value={this.state.phone} required />
						</div>
					</div>
				</div>
			</div>
		);
	}
}

ReactDOM.render(<Appkl />, containerkl);

// <div>
// 	<div class="form-group row">
// 		<label for="order_kl_quantity" class="col-sm-4 col-form-label text-left text-sm-right">*人數</label>
// 		<div class="col-sm-8">
// 			<select id="order_kl_quantity" name="Order[quantity]" class="form-control form-control-sm" required onChange={this.quantity} value={this.state.quantity}>
// 				<option value="1">1 位</option>
// 				<option value="2">2 位</option>
// 				<option value="3">3 位</option>
// 				<option value="4">4 位</option>
// 			</select>
// 		</div>
// 	</div>
// 	<div>
// 		{person}
// 	</div>
// </div>

const containerjb = document.querySelector('#form-jb-react');

class Appjb extends React.Component {

	constructor(props) {
		super(props);

		this.state = {
			quantity : 1
		}

		this.quantity = this.quantity.bind(this);
	}

	quantity(e) {

		this.setState({
			quantity : e.target.value
		});
	}

	render() {
		let person = [];
		for (let i = 0; i < this.state.quantity; ++i) {
			person.push(<Personjb key={i} id={i} />);
		}
		return (
			<div>
				<div class="row">
					<div class="col-12 col-md-6 mx-auto">
						<div class="form-group">
							<label for="order_jb_quantity">*人數</label>
							<select id="order_jb_quantity" name="Order[quantity]" class="form-control form-control-sm" required onChange={this.quantity} value={this.state.quantity}>
								<option value="1">1 位</option>
								<option value="2">2 位</option>
								<option value="3">3 位</option>
								<option value="4">4 位</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					{person}
				</div>
			</div>
		);
	}
}

class Personjb extends React.Component {

	constructor(props) {
		super(props);

		this.state = {
			name  : '',
			email : '',
			phone : ''
		}
	}

	render() {
		const id    = this.props.id + 1;
		const style = {
			backgroundColor : '#eee'
		};
		return (
			<div class="col-12 col-md-6 mx-auto mb-3">
				<div class="card">
					<div class="card-body" style={style}>
						<div class="form-group">
							<label for={'order_jb_name_' + id}>*名字 {id}</label>
							<input id={'order_jb_name_' + id} class="form-control form-control-sm" type="text" name={'Order[person][' + id + '][name]'} onChange={e => this.setState({ name : e.target.value })} value={this.state.name} required />
						</div>
						<div class="form-group">
							<label for={'order_jb_email_' + id}>*電郵 {id}</label>
							<input id={'order_jb_email_' + id} class="form-control form-control-sm" type="email" name={'Order[person][' + id + '][email]'} onChange={e => this.setState({ email : e.target.value })} value={this.state.email} required />
						</div>
						<div class="form-group">
							<label for={'order_jb_phone_' + id}>*電話 {id}</label>
							<input id={'order_jb_phone_' + id} class="form-control form-control-sm" type="text" name={'Order[person][' + id + '][phone]'} onChange={e => this.setState({ phone : e.target.value })} value={this.state.phone} required />
						</div>
					</div>
				</div>
			</div>
		);
	}
}

ReactDOM.render(<Appjb />, containerjb);


