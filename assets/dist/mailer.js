'use strict';

System.register('teamelf/mailer/Mailer', ['teamelf/layout/Page', 'teamelf/mailer/MailerCardItem'], function (_export, _context) {
  "use strict";

  var Page, MailerCardItem, _extends, _createClass, _antd, Row, Col, Button, _class;

  function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  }

  function _possibleConstructorReturn(self, call) {
    if (!self) {
      throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
    }

    return call && (typeof call === "object" || typeof call === "function") ? call : self;
  }

  function _inherits(subClass, superClass) {
    if (typeof superClass !== "function" && superClass !== null) {
      throw new TypeError("Super expression must either be null or a function, not " + typeof superClass);
    }

    subClass.prototype = Object.create(superClass && superClass.prototype, {
      constructor: {
        value: subClass,
        enumerable: false,
        writable: true,
        configurable: true
      }
    });
    if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass;
  }

  return {
    setters: [function (_teamelfLayoutPage) {
      Page = _teamelfLayoutPage.default;
    }, function (_teamelfMailerMailerCardItem) {
      MailerCardItem = _teamelfMailerMailerCardItem.default;
    }],
    execute: function () {
      _extends = Object.assign || function (target) {
        for (var i = 1; i < arguments.length; i++) {
          var source = arguments[i];

          for (var key in source) {
            if (Object.prototype.hasOwnProperty.call(source, key)) {
              target[key] = source[key];
            }
          }
        }

        return target;
      };

      _createClass = function () {
        function defineProperties(target, props) {
          for (var i = 0; i < props.length; i++) {
            var descriptor = props[i];
            descriptor.enumerable = descriptor.enumerable || false;
            descriptor.configurable = true;
            if ("value" in descriptor) descriptor.writable = true;
            Object.defineProperty(target, descriptor.key, descriptor);
          }
        }

        return function (Constructor, protoProps, staticProps) {
          if (protoProps) defineProperties(Constructor.prototype, protoProps);
          if (staticProps) defineProperties(Constructor, staticProps);
          return Constructor;
        };
      }();

      _antd = antd;
      Row = _antd.Row;
      Col = _antd.Col;
      Button = _antd.Button;

      _class = function (_Page) {
        _inherits(_class, _Page);

        function _class(props) {
          _classCallCheck(this, _class);

          var _this = _possibleConstructorReturn(this, (_class.__proto__ || Object.getPrototypeOf(_class)).call(this, props));

          _this.state = {
            mailers: []
          };
          _this.fetchEmailAccounts();
          return _this;
        }

        _createClass(_class, [{
          key: 'fetchEmailAccounts',
          value: function fetchEmailAccounts() {
            var _this2 = this;

            axios.get('mailer').then(function (r) {
              _this2.setState({ mailers: r.data });
            });
          }
        }, {
          key: 'createMailer',
          value: function createMailer() {
            var _this3 = this;

            axios.post('mailer').then(function (r) {
              _this3.fetchEmailAccounts();
              antd.notification.success({
                message: '新建成功',
                description: '新建发信邮箱成功，请修改配置详情'
              });
            });
          }
        }, {
          key: 'title',
          value: function title() {
            return '邮箱发信设置';
          }
        }, {
          key: 'description',
          value: function description() {
            return [React.createElement(
              'p',
              null,
              '\u9ED8\u8BA4\u53D1\u4FE1\u90AE\u7BB1\u5C06\u4F5C\u4E3A\u91CD\u8BBE\u5BC6\u7801\u3001\u7AD9\u5185\u6D88\u606F\u7B49\u53D1\u9001\u90AE\u7BB1'
            ), React.createElement(
              Button,
              {
                type: 'primary',
                icon: 'mail',
                onClick: this.createMailer.bind(this),
                disabled: !can('mailer.create')
              },
              '\u65B0\u5EFA\u53D1\u4FE1\u90AE\u7BB1'
            )];
          }
        }, {
          key: 'view',
          value: function view() {
            var _this4 = this;

            return React.createElement(
              Row,
              { gutter: 16, type: 'flex' },
              this.state.mailers.map(function (o) {
                return React.createElement(
                  Col,
                  { xs: 24, md: 12, lg: 8 },
                  React.createElement(MailerCardItem, _extends({}, o, {
                    done: function done() {
                      return _this4.fetchEmailAccounts();
                    }
                  }))
                );
              })
            );
          }
        }]);

        return _class;
      }(Page);

      _export('default', _class);
    }
  };
});
'use strict';

System.register('teamelf/mailer/MailerCardItem', ['teamelf/components/InfoEditor'], function (_export, _context) {
  "use strict";

  var InfoEditor, _createClass, _antd, Card, Button, Tag, _class;

  function _defineProperty(obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  }

  function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  }

  function _possibleConstructorReturn(self, call) {
    if (!self) {
      throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
    }

    return call && (typeof call === "object" || typeof call === "function") ? call : self;
  }

  function _inherits(subClass, superClass) {
    if (typeof superClass !== "function" && superClass !== null) {
      throw new TypeError("Super expression must either be null or a function, not " + typeof superClass);
    }

    subClass.prototype = Object.create(superClass && superClass.prototype, {
      constructor: {
        value: subClass,
        enumerable: false,
        writable: true,
        configurable: true
      }
    });
    if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass;
  }

  return {
    setters: [function (_teamelfComponentsInfoEditor) {
      InfoEditor = _teamelfComponentsInfoEditor.default;
    }],
    execute: function () {
      _createClass = function () {
        function defineProperties(target, props) {
          for (var i = 0; i < props.length; i++) {
            var descriptor = props[i];
            descriptor.enumerable = descriptor.enumerable || false;
            descriptor.configurable = true;
            if ("value" in descriptor) descriptor.writable = true;
            Object.defineProperty(target, descriptor.key, descriptor);
          }
        }

        return function (Constructor, protoProps, staticProps) {
          if (protoProps) defineProperties(Constructor.prototype, protoProps);
          if (staticProps) defineProperties(Constructor, staticProps);
          return Constructor;
        };
      }();

      _antd = antd;
      Card = _antd.Card;
      Button = _antd.Button;
      Tag = _antd.Tag;

      _class = function (_React$Component) {
        _inherits(_class, _React$Component);

        function _class(props) {
          _classCallCheck(this, _class);

          var _this = _possibleConstructorReturn(this, (_class.__proto__ || Object.getPrototypeOf(_class)).call(this, props));

          _this.testBtnStatus = {
            default: {
              loading: false,
              type: '',
              text: '测试连接'
            },
            testing: {
              loading: true,
              type: 'dashed',
              text: '测试中'
            },
            success: {
              loading: false,
              type: 'primary',
              text: '连接成功'
            },
            error: {
              loading: false,
              type: 'danger',
              text: '连接失败，再试一次？'
            }
          };
          _this.state = {
            status: 'default'
          };
          return _this;
        }

        _createClass(_class, [{
          key: 'setAsDefault',
          value: function setAsDefault() {
            var _this2 = this;

            axios.put('mailer/' + this.props.id + '/default').then(function (r) {
              _this2.props.done();
              antd.notification.success({
                message: '默认发信邮箱设置成功'
              });
            });
          }
        }, {
          key: 'delete',
          value: function _delete() {
            var _this3 = this;

            antd.Modal.confirm({
              title: '不可恢复',
              content: '确定要删除么？该操作可能无法恢复',
              onOk: function onOk() {
                axios.delete('mailer/' + _this3.props.id).then(function (r) {
                  _this3.props.done();
                  antd.notification.success({
                    message: '删除成功'
                  });
                });
              }
            });
          }
        }, {
          key: 'edit',
          value: function edit(key, value) {
            var _this4 = this;

            return axios.put('mailer/' + this.props.id, _defineProperty({}, key, value)).then(function (r) {
              _this4.props.done();
              return r;
            });
          }
        }, {
          key: 'testConnection',
          value: function testConnection() {
            var _this5 = this;

            this.setState({ status: 'testing' });
            axios.post('mailer/' + this.props.id + '/test').then(function (r) {
              if (r.data.connection === true) {
                _this5.setState({ status: 'success' });
              } else {
                _this5.setState({ status: 'error' });
              }
            }).catch(function (e) {
              _this5.setState({ status: 'error' });
            });
          }
        }, {
          key: 'render',
          value: function render() {
            return React.createElement(
              Card,
              {
                style: { marginBottom: 16 },
                title: this.props.sender,
                extra: this.props.default && React.createElement(
                  Tag,
                  { color: 'red' },
                  '\u9ED8\u8BA4'
                ),
                actions: [React.createElement(
                  Button,
                  {
                    ghost: true, type: 'primary',
                    disabled: this.props.default || !can('mailer.update'),
                    onClick: this.setAsDefault.bind(this)
                  },
                  '\u8BBE\u4E3A\u9ED8\u8BA4'
                ), React.createElement(
                  Button,
                  {
                    type: 'danger',
                    onClick: this.delete.bind(this),
                    disabled: !can('mailer.delete')
                  },
                  '\u5220\u9664'
                )]
              },
              React.createElement(InfoEditor, {
                label: '\u9A71\u52A8',
                value: this.props.driver,
                onEdit: this.edit.bind(this, 'driver'),
                type: 'radio',
                options: [{ label: 'SMTP', value: 'smtp' }],
                readonly: !can('mailer.update')
              }),
              React.createElement(InfoEditor, {
                label: '\u4E3B\u673A',
                value: this.props.host,
                onEdit: this.edit.bind(this, 'host'),
                readonly: !can('mailer.update')
              }),
              React.createElement(InfoEditor, {
                label: '\u7AEF\u53E3',
                value: this.props.port,
                onEdit: this.edit.bind(this, 'port'),
                readonly: !can('mailer.update')
              }),
              React.createElement(InfoEditor, {
                label: '\u52A0\u5BC6\u65B9\u5F0F',
                value: this.props.encryption,
                onEdit: this.edit.bind(this, 'encryption'),
                type: 'radio',
                options: [{ label: 'SSL', value: 'ssl' }, { label: 'TLS', value: 'tls' }, { label: '不加密', value: '' }],
                readonly: !can('mailer.update')
              }),
              React.createElement(InfoEditor, {
                label: '\u767B\u5F55\u540D',
                value: this.props.username,
                onEdit: this.edit.bind(this, 'username'),
                readonly: !can('mailer.update')
              }),
              React.createElement(InfoEditor, {
                label: '\u5BC6\u7801',
                value: this.props.password,
                onEdit: this.edit.bind(this, 'password'),
                readonly: !can('mailer.update')
              }),
              React.createElement(InfoEditor, {
                label: '\u53D1\u4FE1\u90AE\u7BB1',
                value: this.props.sender,
                onEdit: this.edit.bind(this, 'sender'),
                readonly: !can('mailer.update')
              }),
              React.createElement(InfoEditor, {
                label: '\u5907\u6CE8',
                value: this.props.remark,
                onEdit: this.edit.bind(this, 'remark'),
                readonly: !can('mailer.update')
              }),
              React.createElement(
                Button,
                {
                  className: 'full',
                  loading: this.testBtnStatus[this.state.status].loading,
                  type: this.testBtnStatus[this.state.status].type,
                  onClick: this.testConnection.bind(this),
                  disabled: !can('mailer.update')
                },
                this.testBtnStatus[this.state.status].text
              )
            );
          }
        }]);

        return _class;
      }(React.Component);

      _export('default', _class);
    }
  };
});
'use strict';

System.register('teamelf/mailer/main', ['teamelf/common/extend', 'teamelf/mailer/Mailer', 'teamelf/App', 'teamelf/layout/SideNav', 'teamelf/Permission'], function (_export, _context) {
  "use strict";

  var extend, Mailer, App, SideNav, Permission;
  return {
    setters: [function (_teamelfCommonExtend) {
      extend = _teamelfCommonExtend.default;
    }, function (_teamelfMailerMailer) {
      Mailer = _teamelfMailerMailer.default;
    }, function (_teamelfApp) {
      App = _teamelfApp.default;
    }, function (_teamelfLayoutSideNav) {
      SideNav = _teamelfLayoutSideNav.SideNav;
    }, function (_teamelfPermission) {
      Permission = _teamelfPermission.default;
    }],
    execute: function () {

      extend(App.prototype, 'routes', function (routes) {
        routes.push.apply(routes, [{ path: '/mailer', exact: true, component: Mailer }]);
      }); /**
           * This file is part of TeamELF
           *
           * (c) GuessEver <guessever@gmail.com>
           *
           * For the full copyright and license information, please view the LICENSE
           * file that was distributed with this source code.
           */

      extend(SideNav.prototype, 'navigations', function (navigations) {
        if (can('mailer.*')) {
          navigations.push({ path: '/mailer', icon: 'mail', title: '发信邮箱' });
        }
      });

      extend(Permission.prototype, 'permissions', function (permissions) {
        permissions.push({
          name: '发信邮箱',
          children: [{ name: '查看发信邮箱列表', permission: 'mailer.list' }, { name: '创新发信邮箱', permission: 'mailer.create' }, { name: '更新发信邮箱', permission: 'mailer.update' }, { name: '删除发信邮箱', permission: 'mailer.delete' }]
        });
      });
    }
  };
});