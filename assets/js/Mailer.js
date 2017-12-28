/**
 * This file is part of TeamELF
 *
 * (c) GuessEver <guessever@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

import Page from 'teamelf/layout/Page';
const { Row, Col, Button } = antd;
import MailerCardItem from 'teamelf/mailer/MailerCardItem';

export default class extends Page {
  constructor (props) {
    super(props);
    this.state = {
      mailers: []
    };
    this.fetchEmailAccounts();
  }
  fetchEmailAccounts () {
    axios.get('mailer').then(r => {
      this.setState({mailers: r.data});
    })
  }
  createMailer () {
    axios.post('mailer').then(r => {
      this.fetchEmailAccounts();
      antd.notification.success({
        message: '新建成功',
        description: '新建发信邮箱成功，请修改配置详情'
      })
    })
  }
  title () {
    return '邮箱发信设置';
  }
  description () {
    return [
      <p>默认发信邮箱将作为重设密码、站内消息等发送邮箱</p>,
      <Button
        type="primary"
        icon="mail"
        onClick={this.createMailer.bind(this)}
      >新建发信邮箱</Button>
    ];
  }
  view () {
    return (
      <Row gutter={16} type="flex">
        {this.state.mailers.map(o => (
          <Col xs={24} md={12} lg={8}>
            <MailerCardItem
              {...o}
              done={() => this.fetchEmailAccounts()}
            />
          </Col>
        ))}
      </Row>
    );
  }
}
